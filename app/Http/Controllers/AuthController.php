<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function daftar(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'foto_ktm' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        // Simpan file foto_ktm jika ada
        $filePath = null;
        if ($request->hasFile('foto_ktm')) {
            $filePath = $request->file('foto_ktm')->store('uploads/foto_ktm', 'public');
        }

        try {
            // Simpan data pengguna ke database
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'foto_ktm' => $filePath,
            ]);

            // Redirect atau tampilkan pesan sukses
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        } catch (\Exception $e) {
            // Menangkap error
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/login'); // Redirect ke halaman login setelah logout
}

}
