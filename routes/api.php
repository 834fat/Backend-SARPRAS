<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataBarangController;
use App\Http\Controllers\Api\DataRuanganController;
use App\Http\Controllers\Api\PeminjamanController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\RoleController;
use App\Http\Controllers\Api\Admin\UserController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Admin\PermissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route Login
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'index']);

// Route Data Barang
Route::post('/data_barangs/create', [App\Http\Controllers\Api\DataBarangController::class, 'create'])->name('data_barangs.create');
Route::get('/data_barangs/show', [App\Http\Controllers\Api\DataBarangController::class, 'show'])->name('data_barangs.show');
Route::get('/data_barangs/{id}', [App\Http\Controllers\Api\DataBarangController::class, 'showId'])->name('data_barangs.showId');
Route::put('/data_barangs/update/{id}', [App\Http\Controllers\Api\DataBarangController::class, 'update']);
Route::delete('/data_barangs/destroy/{id}', [App\Http\Controllers\Api\DataBarangController::class, 'destroy']);

// Route Data Ruangan
Route::post('/data_ruangans/create', [App\Http\Controllers\Api\DataRuanganController::class, 'create'])->name('data_ruangans.create');
Route::get('/data_ruangans/show', [App\Http\Controllers\Api\DataRuanganController::class, 'show'])->name('data_ruangans.show');
Route::get('/data_ruangans/{id}', [App\Http\Controllers\Api\DataRuanganController::class, 'showId'])->name('data_ruangans.showId');
Route::put('/data_ruangans/update/{id}', [App\Http\Controllers\Api\DataRuanganController::class, 'update']);
Route::delete('/data_ruangans/destroy/{id}', [App\Http\Controllers\Api\DataRuanganController::class, 'destroy']);

// Route Pinjam Barang
Route::post('/peminjaman', [App\Http\Controllers\Api\PeminjamanController::class, 'create']);

// Route untuk barang yang tersedia
Route::get('/barang_tersedia', [App\Http\Controllers\Api\BarangTersediaController::class, 'index']);



// group route with middleware "auth"
Route::group(['middleware' => 'auth:api'], function () { // -> rawan bug....
    // logout
    Route::post('/logout', [App\Http\Controllers\Api\Auth\LoginController::class, 'logout']);
});


// group route with prefix "admin"
Route::prefix('admin')->group(function () {
    // group route with middleware "auth:api"
    Route::group(['middleware' => 'auth:api'], function () {
        // dashboard
        Route::get('/dashboard/count-data', [DashboardController::class, 'getCountData']);

        //roles
        Route::apiResource('/roles', App\Http\Controllers\Api\Admin\RoleController::class)->middleware('permission:roles.index|roles.store|roles.update|roles.delete');

        //permission
        Route::get('/permissions', [\App\Http\Controllers\Api\Admin\PermissionController::class, 'index'])->middleware('permission:permission.index');

        //user
        Route::apiResource('/users', App\Http\Controllers\Api\Admin\UserController::class)->middleware('permission:users.index|users.store|users.update|users.delete');
        
    });
});


      