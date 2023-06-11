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
    return view('adminpage');
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
    return view('userpage');
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
