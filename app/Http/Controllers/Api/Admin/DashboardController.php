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
            // Jumlah total data barang
            $countBarang = DataBarang::count();

            return response()->json([
                'countDataBarang' => $countBarang,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data.'], 500);
        }
    }
}
