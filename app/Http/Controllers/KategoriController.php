<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    function submit(Request $request){
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/admin/kategori');
    }
    public function kategori(Request $request)
{
    $search = $request->input('search');

    // Ambil data kategori dengan pagination, sesuaikan jumlah item per halaman
    $kategori = Kategori::when($search, function ($query) use ($search) {
        $query->where('nama', 'LIKE', "%{$search}%");
    })
    ->paginate(5);  // 10 adalah jumlah kategori per halaman

    return view('admin.kategori', compact('kategori', 'search'));
}

    function edit($id){
        $kategori = Kategori::find($id);
        return view('admin.edit_kategori', compact('kategori'));

    }
    function update(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->update();

        return redirect('/admin/kategori');
    }
    function delete($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/admin/kategori');
    }
}
