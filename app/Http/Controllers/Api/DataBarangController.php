<?php

namespace App\Http\Controllers\Api;

use App\Models\DataBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ], [
            'nama_barang.required' => 'Nama Barang wajib diisi',
            'jumlah.required' => 'Jumlah Barang wajib diisi',
            'jumlah.integer' => 'Jumlah Barang harus berupa angka',
        ]);

        $data = new DataBarang();
        $data->nama_barang = $request->input('nama_barang');
        $data->jumlah = $request->input('jumlah');
        $data->save();

        $countBarang = DataBarang::count();

    return response()->json([
        'message' => 'Data berhasil disimpan',
        'countDataBarang' => $countBarang, // Kirim kembali jumlah total barang dalam respons
    ], 201);

        return response()->json(['message' => 'Data berhasil disimpan'], 201);
    }

    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $data = DataBarang::paginate(5);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function showId($id)
    {
        $data = DataBarang::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|integer',
        ], [
            'nama_barang.required' => 'Nama Barang wajib diisi',
            'jumlah.required' => 'Jumlah Barang wajib diisi',
            'jumlah.integer' => 'Jumlah Barang harus berupa angka',
        ]);

        $data = DataBarang::findOrFail($id);
        $data->nama_barang = $request->input('nama_barang');
        $data->jumlah = $request->input('jumlah');
        $data->save();

        return response()->json(['message' => 'Data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $data = DataBarang::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

}
