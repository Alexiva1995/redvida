<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Product;


class ProductsController extends Controller
{
	public function index()
    {
        $product = Product::all();

		view()->share('title', 'Tienda');

        return view('tienda.index')
        ->with('product', $product);
 
    }

	public function list()
    {
        $product = Product::all();

		view()->share('title', 'Lista de Products');
        return view('tienda.list')
        ->with('product', $product); 
 
    }

    public function create()
    {
		view()->share('title', 'Crear Producto');
        return view('tienda.create');
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

        return redirect()->route('tienda.list')->with('message','Se creo el Producto Exitosamente');
        
    }

    public function edit($id)
    {
        $product = Product::find($id);
		view()->share('title', 'Editar Producto');
		
           return view('tienda.edit')
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
    

        return redirect()->route('tienda.list')->with('message','Se actualizo el Producto Exitosamente');
    }

    public function delete($id)
    {

        $product = Product::find($id);
    
        $product->delete();
      
        return redirect()->route('tienda.list')->with('message','Se elimino el Producto'.' '.$product->product.' '.'Exitosamente');
    }
}
