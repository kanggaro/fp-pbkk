<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();

        // Logika setelah logout, misalnya redirect ke halaman lain
        return redirect('/');
    }
}