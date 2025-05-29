<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $auth = $this->validate($request, [
            "email"=> "required",
            "password"=> "required"
        ]);
    
        if(Auth::attempt($auth)) {
            $request->session()->put('user', Auth::user());
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah!')->withInput();
    }
}
