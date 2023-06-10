<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/success', function () {
    return view('success');
})->middleware('auth'); // middleware

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
});

Route::post('/register', [RegistrationController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login']);
