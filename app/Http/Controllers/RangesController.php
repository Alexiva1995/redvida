<?php

namespace App\Http\Controllers;

use App\Range;
use Illuminate\Http\Request;

class RangesController extends Controller
{
	public function index()
    {
        $range = Range::all();
		view()->share('title', 'Ranges');

        return view('range.list')
        ->with('range', $range);
 
    }

	public function list()
    {
        $range = Range::all();

		view()->share('title', 'Lista de Ranges');
        return view('range.list')
        ->with('range', $range); 
 
    }

    public function create()
    {
		view()->share('title', 'Crear Range');
        return view('range.create');
    }

    public function store(Request $request)
    {
        $range = Range::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $range = Range::create($request->all());

     //Verifico si existe un input file en el formulario con name="photo"
     if ($request->hasFile('photo')) {
        //Asigno a la variable $file el archivo que viene del formulario
        $file = $request->file('photo');
        //Asigno a la variable $name un nombre para mantener el orden en los nombres y obtengo la extensión original del archivo que se cargó en el formulario (.png, .jpg, .pptx, etc)
        $name = 'photo_range.'.$file->getClientOriginalExtension();
        //Muevo el archivo a mi carpeta de destino
        $file->move(public_path() . '/photo', $name);
        //Asigno el nombre con el que se está guardado el archivo a un campo de mi registro en la base de datos en caso de ser necesario
        $range->photoDB = $name;
        //Guardo el registro de la base de datos
    }
		$range->save();

        return redirect()->route('range.list');
        

}

    public function edit($id)
    {
        $range = Range::find($id);
		view()->share('title', 'Editar Range');
		
           return view('range.edit')
           ->with('range', $range); 
        
    }

    public function update(Request $request, $id)
    {
        $range = Range::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $range->update($request->all());

        //Verifico si existe un input file en el formulario con name="photo"
     if ($request->hasFile('photo')) {
        //Asigno a la variable $file el archivo que viene del formulario
        $file = $request->file('photo');
        //Asigno a la variable $name un nombre para mantener el orden en los nombres en este caso es el id, el tamaño del archivo y el nombre original del archivo
        $name = $request->id.'_'.$file->getClientsize().'_'.$file->getClientOriginalName();
        //Muevo el archivo a mi carpeta de destino
        $file->move(public_path() . '/photo', $name);
        //Asigno el nombre con el que se está guardado el archivo a un campo de mi registro en la base de datos en caso de ser necesario
        $range->photoDB = $name;
        //Guardo el registro de la base de datos
    }
        $range->save();


        return redirect()->route('range.list');
    }

    public function delete($id)
    {
        $range = Range::find($id);
        $range->delete();
        return redirect()->route('range.list');
    }
}
