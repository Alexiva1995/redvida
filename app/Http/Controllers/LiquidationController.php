<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Commission;
use App\Liquidation;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\ComisionesController;
//use App\Http\Controllers\WalletController;


class LiquidationController extends Controller
{
    /*Usuario -> Billetera -> Solicitar Retiro */
    public function store(){
        $liquidation = new Liquidation();
        $liquidation->user_id = Auth::user()->ID;
        $liquidation->amount = Auth::user()->wallet_amount;
        $liquidation->wallet = Auth::user()->wallet;
        $liquidation->date = date('Y-m-d');
        $liquidation->save();

        $transaction = new WalletTransaction();
        $transaction->user_id = Auth::user()->ID;
        $transaction->wallet_used = Auth::user()->wallet;
        $transaction->operation_type = 'Débito';
        $transaction->description = 'Solicitud de Retiro';
        $transaction->amount = Auth::user()->wallet_amount;
        $transaction->liquidation_id = $liquidation->id;
        $transaction->save();

        $commissions = Commission::where('user_id', '=', Auth::user()->ID)
                            ->where('status', '=', 0)
                            ->get();
        foreach ($commissions as $commission){
            $commission->liquidation_id = $liquidation->id;
            $commission->status = 1;
            $commission->save();
        }

        $user = User::find(Auth::user()->ID);
        $user->wallet_amount = 0;
        $user->save();

        return redirect()->route('user.wallet.index')->with('message', 'Su solicitud de retiro ha sido creada con éxito');
    }

    /*Usuario -> Liquidaciones -> Liquidaciones Pendientes */
    /*Admin -> Liquidaciones -> Liquidaciones Pendientes */
    public function pending(){
        view()->share('title', 'Liquidaciones');

        if (Auth::user()->rol_id == 1){
            $liquidations = Liquidation::where('user_id', '=', Auth::user()->ID)
                            ->where('status', '=', 0)
                            ->orderBy('id', 'DESC')
                            ->get();
        
            return view('user.liquidations.pending')->with(compact('liquidations'));
        }else{
            $liquidations = Liquidation::where('status', '=', 0)
                            ->orderBy('id', 'DESC')
                            ->get();
        
            return view('admin.liquidations.pending')->with(compact('liquidations'));
        }
    }

    /*Usuario -> Liquidaciones -> Liquidaciones Historial */
    public function record(){
        $liquidations = Liquidation::where('user_id', '=', Auth::user()->ID)
                            ->where('status', '<>', 0)
                            ->orderBy('id', 'DESC')
                            ->get();

        view()->share('title', 'Liquidaciones Historial');

        return view('user.liquidations.record')->with(compact('liquidations'));
    }

    /*Usuario -> Liquidaciones Pendientes -> Ver Comisiones pertenecientes a una liquidación*/
    /*LLamada AJAX */
    public function show_commissions_list($liquidation_id){
        $commissions = Commission::where('liquidation_id', '=', $liquidation_id)
                        ->select('id', 'amount', 'type')
                        ->orderBy('id', 'ASC')
                        ->get();

        return view('user.liquidations.commissionsList')->with(compact('commissions'));
    }

    /*Admin -> Liquidaciones -> Liquidaciones Realizadas */
    public function completed(){
        // TITLE
        view()->share('title', 'Liquidaciones');

        $liquidations = Liquidation::with('user')
                            ->where('status', '=', 1)
                            ->get();

        return view('admin.liquidations.completed')->with(compact('liquidations'));
    }

    /*Admin -> Liquidaciones -> Aprobar o Reversar Liquidación */
    public function update(Request $request){
        $liquidation = Liquidation::find($request->liquidation_id);
        $liquidation->fill($request->all());
        $liquidation->process_date = date('Y-m-d');
        $liquidation->save();

        $commissions = Commission::where('liquidation_id', '=', $liquidation->id)
                        ->get();

        if ($liquidation->status == 1){
            foreach ($commissions as $commission){
                $commission->status = 2;
                $commission->save();
            }

            $transaction = WalletTransaction::where('liquidation_id', '=', $liquidation->id)
                                ->first();
            $transaction->status = 1;      
            $transaction->save();        

        }else{
            foreach ($commissions as $commission){
                $commission->status = 0;
                $commission->liquidation_id = NULL;
                $commission->save();
            }
            
            $user = User::find($liquidation->user_id);
            $user->wallet_amount = ($user->wallet_amount + $liquidation->amount);
            $user->save();

            $transaction = WalletTransaction::where('liquidation_id', '=', $liquidation->id)
                                ->first();
            $transaction->status = 2;      
            $transaction->save();  
        }
        
        return redirect()->back()->with('message', 'La operación se ha realizado con éxito.');
    }










    public function indexUserComision()
    {
        // TITLE
        view()->share('title', 'Generar Liquidaciones');

        return view('liquidation.indexComisiones');
    }

    /**
     * Permite el proceso de filtrado en las liquidaciones
     *
     * @param Request $request
     * @return void
     */
    public function indexFiltro(Request $request)
    {
        // TITLE
        view()->share('title', 'Generar Liquidaciones');
        $comisiones = $this->getComisionesTotalIndex($request->all(), Auth::user()->ID);
        $filtro = true;
        return view('liquidation.index', compact('comisiones', 'filtro'));
    }

    /**
     * Permite traer las comisiones a proccesar dependiendo del o de los filtro aplicados
     *
     * @param array $filtros
     * @param integer $iduser
     * @return array
     */
    public function getComisionesTotalIndex(array $filtros, $iduser = null): array
    {
        $comisiones = [];
        if ($iduser != null && $iduser != 1) {
            $comisionestmp = Commission::where([
                ['status', '=', 0],
                ['user_id', '=', $iduser]
            ])->select(
                DB::raw('sum(total) as total'), 'user_id'
            )->groupBy('user_id')->get();
        }else{
            $comisionestmp = Commission::where('status', '=', 0)->select(
                DB::raw('sum(total) as total'), 'user_id'
            )->groupBy('user_id')->get();
        }

        foreach ($comisionestmp as $comision) {
            $user = User::find($comision->user_id);
            $comision->usuario = 'Usuario No Disponible';
            $comision->status = 0;
            $comision->email = 'Correo no disponible';
            if (!empty($user)) {
                $comision->usuario = $user['display_name'];
                $comision->status = $user['status'];
                $comision->email = $user['user_email'];
            }
            if ($filtros == []) {
                $comisiones[] = $comision;
            }else{
                if (!empty($filtros['activo'])) {
                    if ($comision->status == 1) {
                        if (!empty($filtros['mayorque'])) {
                            if ($comision->total >= $filtros['mayorque']) {
                                $comisiones[] = $comision;
                            }
                        } else {
                            $comisiones[] = $comision;
                        }
                    }
                }else{
                    if (!empty($filtros['mayorque'])) {
                        if ($comision->total >= $filtros['mayorque']) {
                            $comisiones[] = $comision;
                        }
                    } else {
                        $comisiones[] = $comision;
                    }
                }
            }
        }
        return $comisiones;
    }

    /**
     * Permite obtener las comisiones un usuario
     *
     * @param integer $iduser
     * @param integer $status
     * @return object
     */
    public function getComisiones(int $iduser, $status): object {
        $comisiones = Commission::where([
            ['status', '=', $status],
            ['user_id', '=', $iduser]
        ])->select('id', 'date', 'referred_email', 'total', 'concepto')->get();

        foreach ($comisiones as $comision) {
            $user = User::where('user_email', '=', $comision->referred_email)->select('ID', 'display_name')->first();
            $comision->idreferido = 0;
            $comision->referido = 'Usuario no Disponible';
            if (!empty($user)) {
                $comision->idreferido = $user->ID;
                $comision->referido = $user->display_name;
                $comision->date = date('d-m-Y', strtotime($comision->date));
                $comision->total2 = number_format($comision->total, 2, ',', '.');
            }
        }

        return $comisiones;
    }

    /**
     * Permite obtener el total a pagar de las comisiones de un usuario
     *
     * @param integer $iduser
     * @param integer $status
     * @return float
     */
    public function getTotaPagar(int $iduser, $status) : float
    {
        $total = Commission::where([
            ['status', '=', $status],
            ['user_id', '=', $iduser]
        ])->get()->sum('total');

        return $total;
    }

    /**
     * Permite obtener los detalles de las comisiones
     *
     * @param integer $iduser
     * @return string
     */
    public function detalles(int $iduser): string
    {
        $user = User::find($iduser)->only('display_name');
        $data = [
            'comisiones' => $this->getComisiones($iduser, 0),
            'totalPagar' => number_format($this->getTotaPagar($iduser, 0), 2, ',', '.'),
            'usuario' => $user['display_name']
        ];

        return json_encode($data);
    }

    /**
     * Permite general la liquidaciones pendientes de los usuarios
     *
     * @param Request $request
     * @return void
     */
    // public function liduidarUser(Request $request)
    // {
    //     $validate = $request->validate([
    //         'listuser' => ['required']
    //     ]);
    //     if ($validate) {
    //         foreach ($request->listuser as $user) {
    //             $this->generanLiquidacion($user, []);
    //         }
    //         return redirect()->route('liquidacion')->with('msj', 'Liquidaciones Procesadas, salvo las que estan por debajo de 50$');
    //     }
    // }

    /**
     * Permite Procesar las liquidaciones de forma individual para cada usuario
     *
     * @param Request $request
     * @return void
     */
    public function procesarComisiones(Request $request)
    {
        $validate = $request->validate([
            'listcomisiones' => ['required'],
            'wallet' => ['required']
        ]);
        try {
            if ($validate) {
                if ($request->action == 'liquidar') {
                    $estado = $this->generanLiquidacion($request->iduser, $request->listcomisiones, $request->wallet);
                    $status = 'Liquidacion Procesadas';
                    if ($estado == 0) {
                        $status = 'El limite permitido es 50$';
                    }
                    return redirect()->back()->with('msj', $status);
                }elseif($request->action == 'rechazar'){
                    $this->rechazarComisiones($request->listcomisiones, $request->iduser);
                    return redirect()->back()->with('msj', 'Comisiones Rechazadas');
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('msj', 'Ocurrio un error, por favor contacte con el administrador');
        }
    }

    /**
     * Permite rechazar las comisiones
     *
     * @param array $listComisiones
     * @param integer $iduser
     * @return void
     */
    public function rechazarComisiones(array $listComisiones, int $iduser)
    {
        $totalLiquidation = 0;
        foreach ($listComisiones as $comision) {
            $totalLiquidation = ($totalLiquidation + $comision->total);
            Commission::where('id', $comision)->update(['status' => 2]);
        }

        $concepto = 'Comisiones no Restribuidas';

        $user = User::find($iduser);
        $user->wallet_amount = ($user->wallet_amount - $totalLiquidation);
        $dataWallet = [
            'iduser' => $iduser,
            'usuario' => $user->display_name,
            'descripcion' => $concepto,
            'descuento' => 0,
            'debito' => 0,
            'credito' => $totalLiquidation,
            'balance' => $user->wallet_amount,
            'tipotransacion' => 3,
            'status' => 0
        ];
        $this->saveWallet($dataWallet);
    }

    /**
     * Permite procesar las liquidaciones de los usuarios 
     *
     * @param integer $iduser
     * @param array $comisiones
     * @param string $billetera
     * @return int
     */
    public function generanLiquidacion($iduser, $comisionesList, $billetera): int
    {
        $noprocesa = 0;
        $comisiones = $this->getComisiones($iduser, 0);
        $comisionesProcesar = [];
        $totalLiquidation = 0;
        foreach ($comisiones as $comision) {
            if ($comisionesList != []) {
                if (in_array($comision->id, $comisionesList)) {
                    $comisionesProcesar [] = $comision;
                    $totalLiquidation = ($totalLiquidation + $comision->total);
                }
            }else{
                $comisionesProcesar [] = $comision;
                $totalLiquidation = ($totalLiquidation + $comision->total);
            }
        }

        if ($totalLiquidation < 50) {
            return $noprocesa;
        }else{
            $noprocesa = 1;
        }


        
        // $wallet = DB::table('user_campo')->where('ID', '=', $iduser)->select('paypal')->first();
        $feed = ($totalLiquidation * 0.1);
        $totalPagar = ($totalLiquidation - $feed);
        $data = [
            'iduser' => $iduser,
            'total' => $totalPagar,
            'wallet_used' => $billetera,
            'process_date' => Carbon::now(),
            'status' => 0,
            'type_liquidation' => 'Comisiones',
            'monto_bruto' => $totalLiquidation,
            'feed' => $feed
        ];
        $idLiquidacion = $this->saveLiquidation($data);

        $concepto = 'Liquidacion generada por un monto de '.$totalLiquidation;
        
        $user = User::find($iduser);
        $user->wallet_amount = ($user->wallet_amount - $totalLiquidation);
        $user->save();
        $dataWallet = [
            'iduser' => $iduser,
            'usuario' => $user->display_name,
            'descripcion' => $concepto,
            'descuento' => $feed,
            'debito' => 0,
            'credito' => $totalPagar,
            'balance' => $user->wallet_amount,
            'tipotransacion' => 3,
            'status' => 0,
            'correo' => $user->user_email,
        ];
        $this->saveWallet($dataWallet);

        foreach ($comisionesProcesar as $comision) {
            Commission::where('id', $comision->id)->update(['status' => 1, 'id_liquidacion' => $idLiquidacion]);
        }
        return $noprocesa;
    }

    /**
     * Permite guardar la liquidacion y devolver el id correspondiente
     *
     * @param array $data
     * @return integer
     */
    public function saveLiquidation($data): int
    {
        $liquidacion = Liquidation::create($data);

        return $liquidacion->id;
    }
    

    /**
     * Permite obtener la informacion del valor de la moneda
     *
     * @return float
     */
    public function getRateBtc(): float
    {
        $valor = 0;
        // inicia el curl para conectarse a coinbase
		$cURL = curl_init();
		// toda la informacion del arreglo de coinbase
		curl_setopt_array($cURL, array(
            CURLOPT_URL => "https://api.coinbase.com/v2/exchange-rates",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => ['Content-Type: application/json']
			));
		// se ejecuta el curl
        $tmpResult = curl_exec($cURL);
        // verifica si trae la informacion
		if ($tmpResult !== false) {
            $currency = json_decode($tmpResult);
            $valor = $currency->data->rates->BTC;
        }
        return $valor;
    }

    /**
     * Permite ejecutar los comando de coinpayment
     *
     * @param string $cmd
     * @param array $req
     * @return void
     */
    public function coinpayments_api_call($cmd, $req = array()) {
        // Fill these in from your API Keys page
        $public_key = env('COIN_PAYMENT_PUBLIC_KEY');
        $private_key = env('COIN_PAYMENT_PRIVATE_KEY');
        
        // Set the API command and required fields
        $req['version'] = 1;
        $req['cmd'] = $cmd;
        $req['key'] = $public_key;
        $req['format'] = 'json'; //supported values are json and xml
        
        // Generate the query string
        $post_data = http_build_query($req, '', '&');
        
        // Calculate the HMAC signature on the POST data
        $hmac = hash_hmac('sha512', $post_data, $private_key);
        
        // Create cURL handle and initialize (if needed)
        static $ch = NULL;
        if ($ch === NULL) {
            $ch = curl_init('https://www.coinpayments.net/api.php');
            curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        
        // Execute the call and close cURL handle     
        $data = curl_exec($ch);                
        // Parse and return data if successful.
        if ($data !== FALSE) {
            if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
                // We are on 32-bit PHP, so use the bigint as string option. If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
                $dec = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
            } else {
                $dec = json_decode($data, TRUE);
            }
            if ($dec !== NULL && count($dec)) {
                return $dec;
            } else {
                // If you are using PHP 5.5.0 or higher you can use json_last_error_msg() for a better error message
                return array('error' => 'Unable to parse JSON result ('.json_last_error().')');
            }
        } else {
            return array('error' => 'cURL error: '.curl_error($ch));
        }
    }

}
