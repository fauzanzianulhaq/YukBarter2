<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    // function index() {
    //     return view("login");

    // }
    // function login(Request $request){
    //     $request->validate([
    //         'email'=>'required',
    //         'password'=>'required'
    //     ],[
    //         'email.required'=>'Email Wajib Diisi',
    //         'pssword.required'=>'Password Wajib Diisi',
    //     ]);
    //     $infologin =[
    //         'email'=>$request->email,
    //         'password'=>$request->password,
    //     ];

    //     if(Auth::attempt($infologin)){
    //         //kalo otentikasi sukses
    //         return 'sukses';
    //     }else{
    //         //kalau otentikasi gagal
    //         return 'gagal';

    //     }
    //     }
//     public function login(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required'
//     ], [
//         'email.required' => 'Email Wajib Diisi',
//         'password.required' => 'Password Wajib Diisi',
//     ]);

//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         $user = Auth::user();

//         if ($user->role === 'admin') {
//             return redirect()->route('admin.beranda');
//         } else {
//             return redirect()->route('user.beranda');
//         }
//     }

//     return redirect()->back()->withErrors(['error' => 'Email atau password salah']);
// }
public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ], [
        'email.required' => 'Email Wajib Diisi',
        'password.required' => 'Password Wajib Diisi',
    ]);

    // Ambil kredensial login dari input form
    $credentials = $request->only('email', 'password');

    // Coba login dengan kredensial yang diberikan
    if (Auth::attempt($credentials)) {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Cek peran (role) pengguna dan arahkan ke halaman yang sesuai
        if ($user->role === 'admin') {
            return redirect()->route('admin.beranda');
        } else {
            return redirect()->route('user.beranda');
        }
    }

    // Jika login gagal
    return redirect()->back()->withErrors(['error' => 'Email atau password salah']);
}


    }

