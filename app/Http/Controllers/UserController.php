<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    // Ambil barang yang di-upload oleh user yang sedang login
    $barangs = Upload::where('user_id', Auth::id())->paginate(5);

    // Kirimkan data barang ke view
    return view('user.beranda', compact('barangs'));
}
public function jelajahiBarang(Request $request)
{
    $search = $request->input('search'); // Ambil input pencarian

    // Query barang dengan status 'disetujui'
    $barang = Upload::where('status', 'disetujui')
                    ->when($search, function ($query) use ($search) {
                        $query->where('nama_barang', 'LIKE', "%{$search}%")
                              ->orWhere('rating', 'LIKE', "%{$search}%"); // Tambahkan kondisi pencarian
                    })
                    ->select('id', 'nama_barang', 'rating', 'foto') // Pilih kolom yang dibutuhkan
                    ->get();

    return view('user.jelajahiBarang', compact('barang', 'search'));
}


// public function detailBarang($id)
// {
//     // Mengambil data barang berdasarkan ID
//     $barang = Upload::findOrFail($id);

//     // Mengirim data barang ke view
//     return view('user.detailBarang', compact('barang'));
// }


public function store(Request $request)
{
    $request->validate([
        'post_id' => 'required|exists:barang,id', // Ubah 'posts' menjadi 'barang'
        'reason' => 'required|string|max:255',
        'additional_info' => 'nullable|string',
    ]);
    
    Report::create([
        'post_id' => $request->post_id, // ID barang
        'user_id' => auth()->id(),
        'reason' => $request->reason,
        'additional_info' => $request->additional_info,
    ]);

    return redirect()->back()->with('success', 'Laporan telah dikirim. Terima kasih!');
}
public function detail($id)
{
    // Ambil data barang berdasarkan ID
    $barang = Upload::findOrFail($id);

    // Kirim data barang ke view
    return view('user.detailBarang', compact('barang'));
}





    
}
