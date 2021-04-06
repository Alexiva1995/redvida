<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commission;
use DB; use Auth;

class UserController extends Controller{
    public function index(){
        try {
            $comisionesPagadas = Commission::select(DB::raw("SUM(total) as amount"),  DB::raw("DATE_FORMAT(date,'%c') as month"))
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->where('status', '=', 1)
                                    ->groupBy("month")
                                    ->orderBy('month', 'ASC')
                                    ->get();

            $comisionesTotales = Commission::select(DB::raw("SUM(total) as amount"),  DB::raw("DATE_FORMAT(date,'%c') as month"))
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->where('date', '>=', '2021-01-01')
                                    ->where('date', '<=', '2021-12-31')
                                    ->groupBy("month")
                                    ->orderBy('month', 'ASC')
                                    ->get();

            $arrayComisionesPagadas = []; 
            $arrayComisionesTotales = [];
            for ($i = 0; $i <= 11; $i++){
            $arrayComisionesPagadas[$i] = 0;
                $arrayComisionesTotales[$i] = 0;
            }

            foreach ($comisionesPagadas as $comisionPagada){
                $arrayComisionesPagadas[$comisionPagada->month - 1] = $comisionPagada->amount;
            }
            foreach ($comisionesTotales as $comisionTotal){
                $arrayComisionesTotales[$comisionTotal->month - 1] = $comisionTotal->amount;
            }

            $cantReferidosActivos = DB::table('wp_users')
                                        ->where('referred_id', '=', Auth::user()->ID)
                                        ->where('status', '=', 1)
                                        ->count();

            $cantReferidosInactivos = DB::table('wp_users')
                                        ->where('referred_id', '=', Auth::user()->ID)
                                        ->where('status', '=', 0)
                                        ->count();

            $cantReferidos[0] = $cantReferidosActivos;
            $cantReferidos[1] = $cantReferidosInactivos;

            $ultRegistrosDirectos = DB::table('wp_users')
                                        ->select('ID', 'display_name', 'user_email', 'status')
                                        ->where('referred_id', '=', Auth::user()->ID)
                                        ->take(12)
                                        ->get();

            view()->share('title', '');
            return view('user.dashboard')->with(compact('arrayComisionesTotales', 'arrayComisionesPagadas', 'cantReferidos', 'ultRegistrosDirectos')); 
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
