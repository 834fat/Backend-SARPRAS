<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\DataBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getCountData()
    {
        try {
<<<<<<< HEAD
            // Jumlah total data barang
            $countBarang = DataBarang::count();

            return response()->json([
                'countDataBarang' => $countBarang,
=======
            // Jumlah total pengguna
            $countUsers = User::count();

            return response()->json([
                'countUsers' => $countUsers,
>>>>>>> 072bc31115990992cddded610379a91391a72653
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data.'], 500);
        }
    }
}
