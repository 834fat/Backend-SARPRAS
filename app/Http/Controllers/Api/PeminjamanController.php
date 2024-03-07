<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LaporanPeminjaman;
use App\Models\DataBarang; // Import model Barang jika belum di-import

class PeminjamanController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required', // Pastikan validasi disesuaikan dengan input yang digunakan
            'jumlah_pinjam' => 'required|numeric|min:1',
        ]);

        // Cari barang berdasarkan nama
        $barang = DataBarang::where('nama', $request->nama_barang)->firstOrFail();

        // Periksa apakah jumlah barang cukup
        if ($barang->jumlah < $request->jumlah_pinjam) {
            return response()->json(['message' => 'Jumlah barang tidak cukup'], 400);
        }

        // Simpan laporan peminjaman ke database
        $laporan = new LaporanPeminjaman();
        $laporan->tanggal_peminjaman = now(); // Gunakan tanggal sekarang
        $laporan->nama_barang = $barang->nama;
        $laporan->jumlah_pinjam = $request->jumlah_pinjam;
        $laporan->jenis_barang = $barang->jenis; // Misalnya jenis barang disimpan dalam model Barang
        $laporan->nama_peminjam = $request->user()->name; // Ambil nama peminjam dari pengguna yang sedang login
        $laporan->save();

        // Kurangi jumlah barang dalam tabel Barang
        $barang->jumlah -= $request->jumlah_pinjam;
        $barang->save();

        return response()->json(['message' => 'Barang berhasil dipinjam'], 200);
    }
}
