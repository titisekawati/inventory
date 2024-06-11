<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth_logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function auth_login(Request $request) {
        $credentials = $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Pastikan Email dan Password anda benar!');
        return redirect('/login');
    }
    public function login() {
        return view('login');
    }
    public function register() {
        return view('register');
    }
}
