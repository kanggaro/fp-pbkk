<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/success', function () {
    return view('users.success');
})->middleware('auth'); // middleware

Route::get('/register', function () {
    return view('users.register');
})->name('register');

Route::get('/login', function () {
    return view('users.login');
});

Route::get('/error', function () {
    return view('users.error');
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');

Route::get('/profile', [SettingsController::class, 'profile'])->name('profile');

// route admin user

Route::get('/admin', function () {
    return view('.admin.adminpage');
});
    Route::get('/admin/profile', function () {
        return view('.admin.adminprofile');
    });
    Route::get('/admin/books', function () {
        return view('.admin.books.booksindex');
    });
        Route::get('/admin/books/create', function () {
            return view('.admin.books.bookscreate');
        });
        Route::get('/admin/books/edit', function () {
            return view('.admin.books.booksedit');
        });
        Route::get('/admin/books/show', function () {
            return view('.admin.books.booksshow');
        });
    Route::get('/admin/borrows', function () {
        return view('.admin.borrows.borrowbookindex');
    });
    Route::get('/admin/users', function () {
        return view('.admin.users.usersindex');
    });
        Route::get('/admin/users/create', function () {
            return view('.admin.users.userscreate');
        });
        Route::get('/admin/users/edit', function () {
            return view('.admin.users.usersedit');
        });
        Route::get('/admin/users/show', function () {
            return view('.admin.users.usersshow');
        });


Route::get('/user', function () {
    return view('.user.userpage');
});
    Route::get('/user/profile', function () {
        return view('.user.userprofile');
    });
    Route::get('/user/books', function () {
        return view('.user.books.booksindex');
    });
        Route::get('/user/books/show', function () {
            return view('.user.books.booksshow');
        });
    Route::get('/user/borrows', function () {
        return view('.user.borrows.borrowuserindex');
    });

// end route admin user