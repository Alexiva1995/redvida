<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\OrdenProduct;


class ProductsController extends Controller
{
	public function index()
    {
        $product = Product::all();
        $total = DB::table('orden_products')->where('iduser', Auth::ID())->count();
        
		view()->share('title', 'Tienda');

        return view('shop.index')
        ->with('product', $product)
        ->with('total', $total);
 
    }

	public function listUser()
    {
        $product = OrdenProduct::all()->where('iduser', Auth::ID());


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
        $product = OrdenProduct::find($id);

		view()->share('title', 'Editar Producto');
		
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

            if($user->wallet_amount >= '20'){
            $orden = OrdenProduct::create([
                'iduser' => Auth::ID(),
                'id_product' => $request->id,
                'product' => $request->product,
                'amount' => '1',
                'price' => $request->public_value,
            ]);
            $saldoAcumulado = ($orden->getUser->wallet_amount - $request->public_value);
            $orden->getUser->update(['wallet_amount' => $saldoAcumulado]);
            return redirect()->back()->with('message', 'Producto Comprado');
        }else{

            return redirect()->back()->with('error', 'Saldo Insuficiente');
        }
    }






}
