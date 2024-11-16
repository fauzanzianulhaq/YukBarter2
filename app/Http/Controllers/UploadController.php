<?php

namespace App\Http\Controllers;
use App\Models\Upload;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class UploadController extends Controller
{
    function upload(){
         $upload = Upload::get();
        return view('user.beranda', compact('upload'));
    }
public function submit(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'nomor_wa' => 'required|string|max:15',
        'deskripsi' => 'required|string',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        'kategori_id' => 'required|exists:kategori,id'
    ]);

    // Buat instance baru dari model Upload
    $upload = new Upload();
    $upload->nama_barang = $request->nama_barang;
    $upload->nomor_wa = $request->nomor_wa;
    $upload->deskripsi = $request->deskripsi;
    $upload->kategori_id = $request->kategori_id;

    // Menambahkan user_id yang diambil dari user yang sedang login
    $upload->user_id = auth()->user()->id;

    // Status di-set default 'pending' jika tidak diinput
    $upload->status = 'pending'; // Status default

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto', $filename);
        $upload->foto = $filename;
    }

    // Simpan data ke database
    $upload->save();

    return redirect('/user/beranda')->with('success', 'Data barang berhasil ditambahkan!');
}
// function edit($id){
//     $upload = Upload::find($id);
//     return view('user.edit_upload', compact('upload'));

// }
// function update(Request $request, $id){
//     $upload = Upload::find($id);
//     $upload->nama_barang = $request->nama_barang;
//     $upload->nomor_wa = $request->nomor_wa;
//     $upload->deskripsi = $request->deskripsi;
//     $upload->kategori_id = $request->kategori_id;
//     $upload->update();

//     return redirect('/user/beranda');
// }
// UploadController.php

public function edit($id)
{
    $barang = Upload::findOrFail($id); // Ambil data barang berdasarkan ID
    $kategoris = Kategori::all(); // Ambil semua kategori

    return view('user.edit_upload', compact('barang', 'kategoris'));
}
public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'nomor_wa' => 'required|string|max:15',
        'deskripsi' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        'kategori_id' => 'required|exists:kategori,id'
    ]);

    $barang = Upload::findOrFail($id); // Cari data barang berdasarkan ID

    // Update data barang
    $barang->nama_barang = $request->nama_barang;
    $barang->nomor_wa = $request->nomor_wa;
    $barang->deskripsi = $request->deskripsi;
    $barang->kategori_id = $request->kategori_id;

    // Jika ada file foto yang diunggah, update fotonya
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto', $filename);
        $barang->foto = $filename;
    }

    $barang->save(); // Simpan perubahan

    return redirect('/user/beranda')->with('success', 'Data barang berhasil diperbarui!');
}
public function delete($id)
{
    // Mengambil data barang berdasarkan ID
    $barang = Upload::find($id);

    // Cek jika data ditemukan
    if (!$barang) {
        return redirect()->back()->with('error', 'Data barang tidak ditemukan.');
    }

    // Hapus gambar dari storage jika ada
    if ($barang->foto) {
        Storage::delete('public/foto/' . $barang->foto);
    }

    // Hapus data barang dari database
    $barang->delete();

    return redirect('/user/beranda')->with('success', 'Data barang berhasil dihapus.');
}





public function create()
    {
        // Ambil data kategori dari tabel kategori
        $kategoris = Kategori::all();

        // Tampilkan view untuk form tambah data dan kirim data kategori
        return view('user.upload', compact('kategoris'));
    }


}
