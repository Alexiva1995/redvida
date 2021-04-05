<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\User;

class ResetPasswordController extends Controller{

    use ResetsPasswords;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function send_password_mail(Request $request){
        $user = User::where('user_email', $request->email)->first();

        if (!is_null($user)){
            $numerorando = random_int(1000000, 9999999);
            $combinar = $numerorando.$user->ID;
            $token = md5($combinar);
            $user->token_correo = $token;
            $user->save(); 

            $data['codigo'] = $token;
            $data['email'] = $request->email;

            Mail::send('emails.recuperarcorreo',  ['data' => $data], function($msj) use ($data){
                $msj->subject('Recuperar Contraseña');
                $msj->to($data['email']);
            });

            return redirect('mioficina/login')->with('msj2', 'Por favor cheque su correo');
        }else{
            return redirect('mioficina/login')->with('msj3', 'El correo no esta registrado');
        }
    }

    public function reset_password($token){
        $user = User::where('token_correo', $token)->first();
        if (!is_null($user)){
            $user_id = $user->ID;
            return view('auth.resetPassword')->with(compact('user_id'));
        }else{
            return redirect('mioficina/login')->with('msj3', 'El código de validación ha expirado');
        }
    }

    public function save_new_password(Request $request){
        $messages = [
            'password.confirmed' => 'Las contraseña ingresadas no coinciden.',
        ];

        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $usuario = User::find($request->user_id);
        $usuario->user_pass = md5($request->password);
        $usuario->password = bcrypt($request->password);
        $usuario->clave = encrypt($request->password);
        $usuario->save();

        return redirect('mioficina/login')->with('msj2', 'Su contraseña ha sido actualizada con éxito');
    }
}
