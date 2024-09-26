<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nombreusuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('nombreusuario', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'nombreusuario' => 'El nombre de usuario o la contraseña son incorrectos.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}