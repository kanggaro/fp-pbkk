<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone_number' => 'nullable',
        ], [
            'password.confirmed' => 'The password confirmation does not match.',
        ]);

        // Simpan data pengguna ke dalam database
        $newUser = new User();
        $newUser->first_name = $request->input('first_name');
        $newUser->last_name = $request->input('last_name');
        $newUser->email = $request->input('email');
        $newUser->password = bcrypt($request->input('password'));
        $newUser->phone_number = $request->input('phone_number');
        $newUser->save();

        // Redirect ke halaman sukses
        return redirect('/success');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            return redirect('/dashboard');
        } else {
            // Jika login gagal
            return redirect('/error')->withErrors(['Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();

        // Logika setelah logout, misalnya redirect ke halaman lain
        return redirect('/');
    }
}