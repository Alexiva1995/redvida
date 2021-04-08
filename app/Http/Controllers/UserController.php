<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commission;
use App\User;
use DB; 
use Auth;

class UserController extends Controller{
    public function index(){
        try {
            $commissionsPaid = Commission::select(DB::raw("SUM(amount) as amount"),  DB::raw("DATE_FORMAT(date,'%c') as month"))
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->where('status', '=', 1)
                                    ->groupBy("month")
                                    ->orderBy('month', 'ASC')
                                    ->get();

            $commissionsTotal = Commission::select(DB::raw("SUM(amount) as amount"),  DB::raw("DATE_FORMAT(date,'%c') as month"))
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->groupBy("month")
                                    ->orderBy('month', 'ASC')
                                    ->get();

            $arrayCommissionsPaid = []; 
            $arrayCommissionsTotal = [];
            for ($i = 0; $i <= 11; $i++){
                $arrayCommissionsPaid[$i] = 0;
                $arrayCommissionsTotal[$i] = 0;
            }

            foreach ($commissionsPaid as $commissionPaid){
                $arrayCommissionsPaid[$commissionPaid->month - 1] = $commissionPaid->amount;
            }
            foreach ($commissionsTotal as $commissionTotal){
                $arrayCommissionsTotal[$commissionTotal->month - 1] = $commissionTotal->amount;
            }

            $lastDirectRecords = DB::table('wp_users')
                                    ->select('ID', 'display_name', 'user_email', 'status')
                                    ->where('referred_id', '=', Auth::user()->ID)
                                    ->take(12)
                                    ->get();

            view()->share('title', '');
            return view('user.dashboard')->with(compact('arrayCommissionsTotal', 'arrayCommissionsPaid', 'lastDirectRecords')); 
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function edit_my_profile(){
        // TITLE
        view()->share('title', 'Editar Mi Perfil');

        if (Auth::user()->rol_id == 0){
            return view('admin.editMyProfile');  
        }else{
            return view('user.editMyProfile');
        }
        
    }

    public function update_my_profile(Request $request){
        $user = User::find(Auth::user()->ID);
        $user->fill($request->all());
        $user->save();

        if (Auth::user()->rol_id == 0){
            return redirect()->route('admin.edit-my-profile')->with('message', 'Sus datos han sido actualizados con éxito.');
        }else{
            return redirect()->route('user.edit-my-profile')->with('message', 'Sus datos han sido actualizados con éxito.');
        }
    }
}
