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
            return redirect()->route('home')->withSuccess('Вы успешно вошли в аккаунт. Добро пожаловать на Kinogo!');
        }

        return back()->withErrors([
            'email' => 'Неверный email или пароль.',
        ])->onlyInput('email');
    }

    public function registerPost(Request $request) 
    {
        $validated = $request->validate([
            'name' => ['required', 'max:55', 'min:2'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ]);
        User::create($validated);

        return redirect()->route('login')->withSuccess('Регистрация прошла успешно. Войдите в свой аккаунт.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Вы успешно вышли из аккаунта.');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('home.user-profile', compact('user'));
    }

    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        // Сохраняем в storage/app/public/avatars
        $path = $request->file('image')->store('avatars', 'public');

        $user->image = $path;
        $user->save();

        return back()->with('success', 'Изображение успешно обновлено.');
    }

}
