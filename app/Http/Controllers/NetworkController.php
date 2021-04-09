<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class NetworkController extends Controller{

    public function directs_record(){
        // TITLE
        view()->share('title', 'Mi Negocio');
        // DO MENU
        view()->share('do', collect(['name' => 'network', 'text' => 'Red de Usuarios']));

        $referidosDirectos = User::where('referred_id', '=', Auth::user()->ID)
                                ->select('ID', 'user_email', 'created_at', 'status')
                                ->orderBy('ID', 'DESC')
                                ->get();

        return view('user.network.directsRecord')->with(compact('referidosDirectos'));
    }

    public function networks_record(){
        // TITLE
        view()->share('title', 'Mi Negocio');
        
        $referidos = $this->getReferrals(Auth::user()->ID, [], 1);

        return view('user.network.networksRecord')->with(compact('referidos'));
    }

    public function getReferrals($user, $referrals, $level){
    	if (empty($referrals)){
    		$referrals = collect();
    	}

    	if ($level < 10){
    		$referidos = User::select('ID', 'user_email', 'created_at', 'status')
    					->where('referred_id', '=', $user)
    					->get();

	    	foreach ($referidos as $referido){
	    		$referido->level = $level;
	    		$referrals->push($referido);
	    		$this->getReferrals($referido->ID, $referrals, $level+1);
	    	}
    	}
    	
    	return $referrals;
    }
}
