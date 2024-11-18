<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Upload;

class ReportController extends Controller
{
    // Menampilkan daftar laporan
    public function index()
    {
        $reports = Report::with('barang', 'user') // Mengambil laporan beserta data barang dan user yang melaporkan
                        ->whereNull('resolved_at') // Menampilkan laporan yang belum ditangani
                        ->paginate(10);

        return view('admin.validasi', compact('reports'));
    }

    // Menampilkan detail laporan
    public function show($id)
    {
        $report = Report::with('barang', 'user')->findOrFail($id);
        $barang = $report->barang;

    if (!$barang) {
        return redirect()->back()->withErrors('Barang tidak ditemukan.');
    }

        return view('admin.detail_validasi', compact('report', 'barang'));
    }

    // Menandai laporan sebagai sudah ditangani
    public function resolve(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        // Memperbarui status laporan dan tindakan yang diambil
        $report->resolved_at = now();
        $report->action_taken = $request->input('action_taken', 'Barang telah dihapus');
        $report->save();

        // Menghapus barang yang dilaporkan jika diperlukan
        $barang = Upload::findOrFail($report->post_id);
        $barang->delete(); // Menghapus barang

        return redirect()->route('reports.index')->with('success', 'Laporan telah diproses dan barang dihapus.');
    }

    // Menghapus laporan
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan telah dihapus.');
    }
}
