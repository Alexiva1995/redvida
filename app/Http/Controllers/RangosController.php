<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Rango;


class RangosController extends Controller
{
	public function index()
    {
        $rango = Rango::all();
		view()->share('title', 'Rangos');

        return view('rango.list')
        ->with('rango', $rango);
 
    }

	public function list()
    {
        $rango = Rango::all();

		view()->share('title', 'Lista de Rangos');
        return view('rango.list')
        ->with('rango', $rango); 
 
    }

    public function create()
    {
		view()->share('title', 'Crear Rango');
        return view('rango.create');
    }

    public function store(Request $request)
    {
        $rango = Rango::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $rango = Rango::create($request->all());
		$rango->save();

           // foto

        //    if ($request->hasFile('photo')) {
        //        if(!$producto->getMedia('photo')->isEmpty()) {
        //            $producto->getFirstMedia('photo')->delete();
        //        }
        //        $producto->addMediaFromRequest("photo")->toMediaCollection('photo');
        //    }


        return redirect()->route('mioficina.rango.list');
        
    }

    public function edit($id)
    {
        $rango = Rango::find($id);
		view()->share('title', 'Editar Rango');
		
           return view('rango.edit')
           ->with('rango', $rango); 
        
    }

    public function update(Request $request, $id)
    {
        $rango = Rango::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $rango->update($request->all());
        $rango->save();

           // foto

        // if ($request->hasFile('photo')) {
        //     if(!$producto->getMedia('photo')->isEmpty()) {
        //         $producto->getFirstMedia('photo')->delete();
        //     }
        //     $producto->addMediaFromRequest("photo")->toMediaCollection('photo');
        // }

        return redirect()->route('mioficina.rango.list');
    }

    public function delete($id)
    {
        $rango = Rango::find($id);
        $rango->delete();
        return redirect()->route('mioficina.rango.list');
    }
}
