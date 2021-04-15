<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
	public function index()
    {
        $product = Product::all();
        $total = DB::table('orders')->where('user_id', Auth::ID())->count();
        $user = Auth::user();
        
		view()->share('title', 'Tienda');

        return view('shop.index')
        ->with('product', $product)
        ->with('total', $total)
        ->with('user', $user);
 
    }

	public function listUser()
    {
        $product = Order::all()->where('user_id', Auth::ID());


		view()->share('title', 'Historial de Ordenes');
        return view('shop.list-user')
        ->with('product', $product);

 
    }

    public function list()
    {
        $product = Product::all();

		view()->share('title', 'Lista de Productos');
        return view('shop.list')
        ->with('product', $product); 
 
    }

    public function show($id)
    {
        $product = Order::find($id);

		view()->share('title', 'Revisar Producto');
		
           return view('shop.show')
           ->with('product', $product);
        
    }

    public function create()
    {
		view()->share('title', 'Crear Producto');
        return view('shop.create');
    }

    public function store(Request $request)
    {
        $product = Product::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $product = Product::create($request->all());
             //Verifico si existe un input file en el formulario con name="photo"
     if ($request->hasFile('photo')) {
        //Asigno a la variable $file el archivo que viene del formulario
        $file = $request->file('photo');
        //Asigno a la variable $name un nombre para mantener el orden en los nombres en este caso es el id, el tamaño del archivo y el nombre original del archivo
        $name = $request->id.'_'.$file->getClientsize().'_'.$file->getClientOriginalName();
        //Muevo el archivo a mi carpeta de destino
        $file->move(public_path() . '/product', $name);
        //Asigno el nombre con el que se está guardado el archivo a un campo de mi registro en la base de datos en caso de ser necesario
        $product->photoDB = $name;
        //Guardo el registro de la base de datos
    }
		$product->save();

        // foto

        //    if ($request->hasFile('photo')) {
        //        if(!$product->getMedia('photo')->isEmpty()) {
        //            $product->getFirstMedia('photo')->delete();
        //        }
        //        $product->addMediaFromRequest("photo")->toMediaCollection('photo');
        //    }

        return redirect()->route('shop.list')->with('message','Se creo el Producto Exitosamente');
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
		view()->share('title', 'Editar Producto');
		
           return view('shop.edit')
           ->with('product', $product); 
        
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $product->update($request->all());
             //Verifico si existe un input file en el formulario con name="photo"
             if ($request->hasFile('photo')) {
                //Asigno a la variable $file el archivo que viene del formulario
                $file = $request->file('photo');
                //Asigno a la variable $name un nombre para mantener el orden en los nombres en este caso es el id, el tamaño del archivo y el nombre original del archivo
                $name = $request->id.'_'.$file->getClientsize().'_'.$file->getClientOriginalName();
                //Muevo el archivo a mi carpeta de destino
                $file->move(public_path() . '/product', $name);
                //Asigno el nombre con el que se está guardado el archivo a un campo de mi registro en la base de datos en caso de ser necesario
                $product->photoDB = $name;
                //Guardo el registro de la base de datos
            }
                $product->save(); 
    

        return redirect()->route('shop.list')->with('message','Se actualizo el Producto Exitosamente');
    }

    public function delete($id)
    {

        $product = Product::find($id);
    
        $product->delete();
      
        return redirect()->route('shop.list')->with('message','Se elimino el Producto'.' '.$product->product.' '.'Exitosamente');
    }

    public function saveOrden(Request $request)
    {
            $user = Auth::user();

            if($user->wallet_amount >= $request->public_value){
            $orden = Order::create([
                'user_id' => Auth::ID(),
                'product_id' => $request->id,
                'amount' => '1',
            ]);

            $wallet = $user->wallet_amount - $request->public_value;
            $orden->getUser->update(['wallet_amount' => $wallet]);

            $referred_id = $orden->getUser->referred_id;
            $referred = User::find($referred_id);

            $product = Product::find($request->id);

            if($user->referred_id != NULL){
            $referred->update([
                'pts_buy_monthly' => $product->pts_buy_monthly + $referred->pts_buy_monthly,
                'pts_purchase_ranges' => $product->pts_purchase_ranges + $referred->pts_purchase_ranges,
                'pts_purchase_prizes' => $product->pts_purchase_prizes + $referred->pts_purchase_prizes
                ]);
            }

            return redirect()->back()->with('message', 'Producto Comprado');
        }else{
            return redirect()->back()->with('error', 'Saldo Insuficiente');
        }
    }






}
