<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            // return redirect('/dashboard');
            if(Auth::user()->email == "admin@example.com" or Auth::user()->password == "admin")
                return redirect('/admin');
            else 
                return redirect('/user');
        } else {
            // Jika login gagal
            return redirect('/error')->withErrors(['Invalid credentials']);
        }
    }
}