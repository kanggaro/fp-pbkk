<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    // Validasi data
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'phone_number' => 'nullable',
    ]);

    // Periksa apakah email sudah terdaftar
    $user = User::where('email', $request->email)->first();
    if ($user) {
        return redirect('/register')->withErrors(['Email already exists']);
    }

    // Simpan data pengguna ke dalam database
    $user = new User();
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone_number = $request->phone_number;
    $user->save();

    // Redirect ke halaman sukses
    return redirect('/success');
})->name('register');


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Jika login berhasil
        return redirect('/dashboard');
    } else {
        // Jika login gagal
        return redirect('/login')->withErrors(['Invalid credentials']);
    }
});