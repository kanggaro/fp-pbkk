<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

Route::get('/profile', [SettingsController::class, 'profile'])->name('profile');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
