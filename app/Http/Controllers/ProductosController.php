<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Producto;


class ProductosController extends Controller
{
	public function index()
    {
        $producto = Producto::all();
        // $producto = $producto->sortByDesc('estado');
		view()->share('title', 'Tienda');

        return view('tienda.index')
        ->with('producto', $producto);
 
    }

	public function list()
    {
        $producto = Producto::all();

		view()->share('title', 'Lista de Productos');
        return view('tienda.list')
        ->with('producto', $producto); 
 
    }

    public function create()
    {
		view()->share('title', 'Crear Producto');
        return view('tienda.create');
    }

    public function store(Request $request)
    {
        $producto = Producto::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $producto = Producto::create($request->all());
		$producto->save();

        // foto

        //    if ($request->hasFile('photo')) {
        //        if(!$producto->getMedia('photo')->isEmpty()) {
        //            $producto->getFirstMedia('photo')->delete();
        //        }
        //        $producto->addMediaFromRequest("photo")->toMediaCollection('photo');
        //    }

        return redirect()->route('mioficina.tienda.list');
        
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
		view()->share('title', 'Editar Producto');
		
           return view('tienda.edit')
           ->with('producto', $producto); 
        
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $producto->update($request->all());
        $producto->save();

        // foto

        // if ($request->hasFile('photo')) {
        //     if(!$producto->getMedia('photo')->isEmpty()) {
        //         $producto->getFirstMedia('photo')->delete();
        //     }
        //     $producto->addMediaFromRequest("photo")->toMediaCollection('photo');
        // }

        return redirect()->route('mioficina.tienda.list');
    }

    public function delete($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('mioficina.tienda.list');
    }
}
