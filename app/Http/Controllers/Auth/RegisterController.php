<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User; 
use App\Settings; 
use Carbon\Carbon;
use App\Formulario; 
use App\OpcionesSelect;
use App\SettingCorreo;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

class RegisterController extends Controller{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        
    }

    public function register(){
        return view('auth.register');
    }

    public function post_register(Request $data){
        try {
            // Obtenemos las configuraciones por defecto
            $settings = Settings::first();

            $messages = [
                'user_email.unique' => 'El correo ingresado ya se encuentra registrado.',
                'user_email.confirmed' => 'Los correos ingresados no coinciden.',
                'password.confirmed' => 'Las contraseña ingresadas no coinciden.',
            ];

            $validator = Validator::make($data->all(), [
                'user_email' => 'max:100|unique:'.$settings->prefijo_wp.'users|confirmed',
                'password' => 'confirmed',
            ], $messages);

            if ($validator->fails()) {
                return redirect('mioficina/autentication/register')
                        ->withErrors($validator)
                        ->withInput();
            }

            // Obtenemos el referido.
            $referido = $settings->referred_id_default;
            if(isset($data['referred_id'])){
                if (empty($data['referred_id'])) {
                    $data['referred_id'] = 1;
                }
                if ($this->VerificarUser($data['referred_id'])) {
                    return redirect()->back()->withInput()->with('msj2', 'El ID ('.$data['referred_id'].') del usuario no esta registrado, Intente con otro ID');
                }
                $referido =  $data['referred_id'];
            }

            $user = User::create([
                'user_email' => $data['user_email'],
                'user_status' => '0',
                'user_registered' => Carbon::now(),
                'user_pass' => md5($data['password']),
                'password' => bcrypt($data['password']),
                'clave' => encrypt($data['password']),
                'referred_id' => $referido,
                'status' => '0'
            ]);

            // inserta en usermeta
            $this->insertUserMeta($user);

            Auth::guard()->login($user);
            return redirect()->action('HomeController@index')->with('msj', 'Se Registrado Exitosamente');
        } catch (\Throwable $th) {
            \Log::info("Error en registro ".$th);
            return redirect()->back()->withInput()->with('msj2', 'El Registro no fue valido, hubo un error en el proceso de registro, contacte con el adminitrador');
        }
    }

    public function VerificarUser($id){
        $resul = true;
        $user = User::where('ID', $id)->first();
        if (!empty($user)) {
            $resul = false;
        }

        return $resul;
    }

    private function insertarCampoUser($userid, $data){
        $formulario = Formulario::where('estado', 1)->get();
        $arraytpm [] = ['ID' => $userid];
        $arrayuser = [];

        foreach ($formulario as $campo) {
            $arraytpm [] = [
                ''.$campo->nameinput.'' => $data[$campo->nameinput]
            ];
        }

        $arrayuser = $arraytpm[0];
        for ($i= 1 ; $i < count($arraytpm); $i++) { 
            $arrayuser = array_merge($arrayuser,$arraytpm[$i]);
        }

        DB::table('user_campo')->insert($arrayuser);
    }

    private function insertUserMeta($data){
        $settings = Settings::first();
        DB::table($settings->prefijo_wp.'usermeta')->insert([
            ['user_id' => $data->ID, 'meta_key' => 'nickname', 'meta_value' => $data->user_email],
            ['user_id' => $data->ID, 'meta_key' => 'first_name', 'meta_value' => $data->display_name],
            ['user_id' => $data->ID, 'meta_key' => 'last_name', 'meta_value' => $data->display_name],
            ['user_id' => $data->ID, 'meta_key' => $settings->prefijo_wp.'capabilities', 'meta_value' => 'a:1:{s:10:"subscriber";b:1;}'],
            ['user_id' => $data->ID, 'meta_key' => 'billing_first_name', 'meta_value' => $data->display_name],
            ['user_id' => $data->ID, 'meta_key' => 'billing_last_name', 'meta_value' => $data->display_name],
            ['user_id' => $data->ID, 'meta_key' => 'billing_email', 'meta_value' => $data->user_email],
            ['user_id' => $data->ID, 'meta_key' => 'billing_phone', 'meta_value' => $data->phone],
        ]);
    }

    /*public function fact2(){
        return view('auth.2fact');
    }

    public function validar2fact(Request $request){
        if ((new Google2FA())->verifyKey(Auth::user()->toke_google, $request->code)) {
            return redirect('mioficina/admin');
        }else{
            return redirect()->back()->with('msj2', 'codigo incorreto');
        }
    }*/
}

