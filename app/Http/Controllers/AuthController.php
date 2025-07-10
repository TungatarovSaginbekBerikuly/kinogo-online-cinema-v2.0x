<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('home.auth.login');
    }

    public function register(Request $request) 
    {
        return view('home.auth.register');
    }

    public function loginPost(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->withSuccess('Добро пожаловать на Kinogo!');
        }

        return back()->withErrors([
            'email' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email');
    }

    public function registerPost(Request $request) 
    {
        $validation = $request->validate([
            'name' => ['required', 'max:55', 'min:2'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        User::create($validation);

        return redirect()->route('login')->withSuccess('Пользователь зарегистрирован. Войдите в аккаунт.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
