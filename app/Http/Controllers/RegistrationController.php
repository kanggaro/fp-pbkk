<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone_number' => 'nullable',
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
}
