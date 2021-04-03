<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Billetera;


class BilleterasController extends Controller
{
	public function index()
    {
        $billetera = Billetera::where('iduser', Auth::id())->get();
		view()->share('title', 'Billetera');


        return view('wallet.index')
        ->with('billetera', $billetera);
 
    }

	public function list()
    {
        $billetera = Billetera::all();

		view()->share('title', 'Lista de Billeteras');
        return view('wallet.list')
        ->with('billetera', $billetera); 
 
    }

    public function create()
    {
		view()->share('title', 'Crear Billetera');
        return view('wallet.create');
    }

    public function store(Request $request)
    {
        $billetera = Billetera::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $billetera = Billetera::create($request->all());
		$billetera->save();

        return redirect()->route('mioficina.wallet.list');
        
    }

    public function edit($id)
    {
        $billetera = Billetera::find($id);
		view()->share('title', 'Editar Billetera');
		
           return view('wallet.edit')
           ->with('billetera', $billetera); 
        
    }

    public function update(Request $request, $id)
    {
        $billetera = Billetera::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $billetera->update($request->all());
        $billetera->save();

        return redirect()->route('mioficina.wallet.list');
    }

    public function delete($id)
    {
        $billetera = Billetera::find($id);
        $billetera->delete();
        return redirect()->route('mioficina.wallet.list');
    }
}
