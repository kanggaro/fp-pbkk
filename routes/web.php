<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
=======
>>>>>>> c9ea6c761f7be28d8fea98268ee4539c546f2eb7

Route::get('/', function () {
    return view('home');
});

<<<<<<< HEAD
Route::get('/login', function () {
    return view('login');
});

Route::get('/success', function () {
    return view('success');
});


Route::get('/books', 'App\Http\Controllers\BookController@index')->name('books.index');

/* 
    kalo mau lihat GUI admin ama user tanpa login 
    comment dulu route login registernya 
*/
/* 
    trus langsung tembak di searchnya aja
    kalo mau lihat tampilan 'admin tambah buku'
        ex: localhost:8080/admin/books/create 
    note : masih belum bisa tombolnya
*/

// route admin user

Route::get('/admin', function () {
    return view('.admin.adminpage');
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

Route::match(['get', 'post'], '/register', function (Request $request) {
    if ($request->isMethod('post')) {
        // Validasi data
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone_number' => 'nullable',
        ]);

        // Simpan data pengguna ke dalam database
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->save();

        // Redirect ke halaman sukses atau halaman lainnya
        return redirect('/success');
    }

    return view('register');
});

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
=======
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
>>>>>>> c9ea6c761f7be28d8fea98268ee4539c546f2eb7
