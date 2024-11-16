<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateName(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
    ]);
    $admin = User::where('role', 'admin')->first();
    // Update nama pengguna yang sedang login
    $user = User::find(auth()->id());
    $user->name = $request->name;
    $user->save();

    return redirect()->back()->with('success', 'Nama berhasil diubah.');
}
public function profile()
{
    $admin = User::where('role', 'admin')->first();
    return view('admin.profile', compact('admin'));
}
public function password()
{
    $admin = User::where('role', 'admin')->first();
    return view('admin.password_profile', compact('admin'));
}
public function avatar()
{
    $admin = User::where('role', 'admin')->first();
    return view('admin.avatar_profile', compact('admin'));
}
public function updatePassword(Request $request)
{
    // Validasi input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // Ambil user saat ini
    $user = User::find(Auth::id());
    if (!$user) {
        return back()->withErrors(['message' => 'User tidak ditemukan.']);
    }

    // Cek apakah password lama cocok
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
    }

    // Update password baru
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('status', 'Password berhasil diubah!');
}

//PROFILE USER ===============

public function profileUser()
{
    $user = auth()->user(); // Mengambil user yang sedang login
    return view('user.profile', compact('user'));
}
public function passwordUser()
{
    $user = auth()->user(); // Mengambil user yang sedang login
    return view('user.password_profile', compact('user'));
}
public function avatarUser()
{
    $user = auth()->user(); // Mengambil user yang sedang login
    return view('user.avatar_profile', compact('user'));
}
public function updateNameUser(Request $request)
{
    
    $request->validate([
        'name' => 'required|string|max:255',
    ]);
    $user = auth()->user(); 
    // Update nama pengguna yang sedang login
    $user = User::find(auth()->id());
    $user->name = $request->name;
    $user->save();

    return redirect()->back()->with('success', 'Nama berhasil diubah.');
}
public function updatePasswordUser(Request $request)
{
    // Validasi input
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // Ambil user saat ini
    $user = User::find(Auth::id());
    if (!$user) {
        return back()->withErrors(['message' => 'User tidak ditemukan.']);
    }

    // Cek apakah password lama cocok
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Password lama tidak sesuai.']);
    }

    // Update password baru
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('status', 'Password berhasil diubah!');
}





}
