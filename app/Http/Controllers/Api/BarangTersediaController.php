<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataBarang; // Pastikan untuk mengimport model DataBarang

class BarangTersediaController extends Controller
{
    public function index()
    {
        // Ambil daftar barang yang tersedia dari database
        $barangTersedia = DataBarang::where('jumlah', '>', 0)->get();

        // Kirim response JSON dengan daftar barang yang tersedia
        return response()->json($barangTersedia);
    }
}
