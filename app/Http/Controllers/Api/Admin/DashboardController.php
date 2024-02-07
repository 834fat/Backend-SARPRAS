<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function getCountData()
    {
        try {
            // Jumlah total pengguna
            $countUsers = User::count();

            return response()->json([
                'countUsers' => $countUsers,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data.'], 500);
        }
    }
}