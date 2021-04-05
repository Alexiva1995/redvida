<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Sesion;
use Socialite;
use Google_Client;
use Google_Service_People;
use Auth;

class LoginController extends Controller{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function post_login(Request $request){
        $data = ['user_email' => $request->user_email,
                 'password' => $request->password];

        if (Auth::attempt($data)) {
            $hoy=date('Y-m-d');
            $ip = $request->ip();
            $actividad = new Sesion();
            $actividad->user_id= Auth::user()->ID;
            $actividad->fecha= $hoy;
            $actividad->ip= $ip;
            $actividad->actividad= 'Inicio Sesion';
            $actividad->save();

            return redirect()->action('HomeController@index');
        }else{
            $user = User::where('user_email', $request->user_email)->first();
            
            if (is_null($user)) {
                return redirect('mioficina/login')->with('msj3', 'El correo ingresado no se encuentra registrado');
            }else{
                return redirect('mioficina/login')->with('msj3', 'La contraseña ingresada es incorrecta');
            }
        } 
    }

    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        try{
            $user = Socialite::driver($provider)->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort(403, 'Unauthorized action.');
            return redirect()->to('/');
        }
        $attributes = [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),

        ];

        $user = User::where('provider_id', $user->getId() )->first();
        
        if (!$user){
            try{
                $user=  User::create($attributes);
            }catch (ValidationException $e){
              return redirect()->to('/home');
            }
        }

        $this->guard()->login($user);
        return redirect()->to($this->redirectTo);
    }        
}
