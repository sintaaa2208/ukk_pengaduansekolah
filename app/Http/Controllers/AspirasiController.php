<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InputAspirasi;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    // Simpan Pengaduan Siswa
    public function store(Request $request) {
        $id_pelaporan = rand(1000, 9999);
        
        InputAspirasi::create([
            'id_pelaporan' => $id_pelaporan,
            'nis' => auth()->user()->nis,
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
        ]);

        // Inisialisasi status di tabel aspirasi
        Aspirasi::create([
            'id_aspirasi' => $id_pelaporan,
            'id_kategori' => $request->id_kategori,
            'status' => 'Menunggu'
        ]);

        return back()->with('success', 'Aspirasi berhasil dikirim!');
    }

    // Update Status & Feedback oleh Admin
    public function updateStatus(Request $request, $id) {
        $aspirasi = Aspirasi::find($id);
        $aspirasi->update([
            'status' => $request->status,
            'feedback' => $request->feedback
        ]);

        return back()->with('success', 'Status diperbarui.');
    }
}