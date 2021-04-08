<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Wallets;


class WalletsController extends Controller
{
	public function index()
    {
        $wallet = Wallets::where('iduser', '=', Auth::user()->ID)->get();
		view()->share('title', 'Billetera');

        return view('wallet.index')
        ->with('wallet', $wallet);
 
    }

	public function list()
    {
        $wallet = Wallets::all();

		view()->share('title', 'Lista de Billeteras');
        return view('wallet.list')
        ->with('wallet', $wallet); 
 
    }

    public function create()
    {
		view()->share('title', 'Crear Billeteras');
        return view('wallet.create');
    }

    public function store(Request $request)
    {
        $wallet = Wallets::all();

        $fields = [   ];

        $msj = [    ];

        $this->validate($request, $fields, $msj);

        $wallet = Wallets::create($request->all());
		$wallet->save();

        return redirect()->route('mioficina.wallet.list');
        
    }

    public function edit($id)
    {
        $wallet = Wallets::find($id);
		view()->share('title', 'Editar Billeteras');
		
           return view('wallet.edit')
           ->with('wallet', $wallet); 
        
    }

    public function update(Request $request, $id)
    {
        $wallet = Wallets::find($id);

        $fields = [     ];

        $msj = [       ];

        $this->validate($request, $fields, $msj);

        $wallet->update($request->all());
        $wallet->save();

        return redirect()->route('mioficina.wallet.list');
    }

    public function delete($id)
    {
        $wallet = Wallets::find($id);
        $wallet->delete();
        return redirect()->route('mioficina.wallet.list');
    }
}
