<?php

namespace App\Http\Controllers;

use App\User;
use App\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

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

            $lastDirectRecords = DB::table('users')
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
        if (isset($request->avatar)){
            if ($request->file('avatar')) {
                $user = User::find(Auth::user()->ID);

                $image = $request->file('avatar');
                $name = 'user_'.Auth::user()->id.'_'.time().'.'.$image->getClientOriginalExtension();
                $path = public_path() .'/img/avatar';
                $image->move($path,$name);

                $user->avatar = $name;
                $user->save();
                
                return redirect()->back()->with('message', 'Su imagen de perfil ha sido actualizada con éxito.');
            }else{
                return redirect()->back()->with('error', 'Hubo un problema al cargar la imagen. Por favor, intente nuevamente.');
            }
        }

        if (isset($request->actual_password)){
            if (Hash::check($request->actual_password, Auth::user()->password)){
                $validator = Validator::make($request->all(), [
                    'password' => 'confirmed',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', 'Las nuevas contraseñas ingresadas no coinciden.');
                }

                $user = User::find(Auth::user()->ID);
                $user->user_pass = md5($request->password);
                $user->password = bcrypt($request->password);
                $user->clave = encrypt($request->password);
                $user->save();

                return redirect()->back()->with('message', 'Su contraseña ha sido actualizada con éxito.');
            }else{
                return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
            }
        }

        $user = User::find(Auth::user()->ID);
        $user->fill($request->all());
        $user->save();

        return redirect()->back()->with('message', 'Sus datos han sido actualizados con éxito.');
    }
}
