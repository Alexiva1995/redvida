<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class ImpersonateController extends Controller
{
   
    public function start(User $user)
    {
        session()->put('impersonated_by', auth()->id());

        Auth::login($user);

        return redirect()->route('admin.index');

    }

    public function stop()
    {

        Auth::loginUsingId(session()->pull('impersonated_by'));

        return redirect()->route('admin.userrecords');
    }
}