<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        // Mengambil data pengaturan dari pengguna saat ini
        $user = Auth::user();
        // Mengembalikan view settings.blade.php dengan data pengguna
        return view('settings', compact('user'));
    }

    public function update(Request $request)
    {
    //     // Validasi data yang dikirimkan oleh form pengaturan
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,' . Auth::id(),
    //         'password' => 'nullable|min:8|confirmed',
    //     ]);

    //     // Mengambil pengguna saat ini
    //     $user = Auth::user();

    //     // Mengupdate data pengguna berdasarkan input pengaturan yang dikirimkan
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     if ($request->password) {
    //         $user->password = bcrypt($request->password);
    //     }
    //     $user->save();

        // Redirect ke halaman pengaturan dengan pesan sukses
    //     return redirect()->route('settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
