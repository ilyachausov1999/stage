<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RegistrationController extends Controller
{
    public function confirmEmail(Request $request, $token)
    {
        User::whereToken($token)->firstOrFail()->confirmEmail();
        $request->session()->flash('message', 'Учетная запись подтверждена. Войдите под своим именем.');
        return redirect('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create($request->all());
        Mail::to($user)->send(new UserRegistered($user));
        $request->session()->flash('message', 'На ваш адрес было выслано письмо с подтверждением регистрации.');
        return redirect('register');
    }
}
