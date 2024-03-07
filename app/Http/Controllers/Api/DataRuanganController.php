<?php

namespace App\Http\Controllers\Api;

use App\Models\DataRuangan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataRuanganController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'jumlah' => 'required|integer',
        ], [
            'nama_ruangan.required' => 'Nama Ruangan wajib diisi',
            'jumlah.required' => 'Jumlah Ruangan wajib diisi',
            'jumlah.integer' => 'Jumlah Ruangan harus berupa angka',
        ]);

        $data = new DataRuangan();
        $data->nama_ruangan = $request->input('nama_ruangan');
        $data->jumlah = $request->input('jumlah');
        $data->id = DataRuangan::max('id') + 1; // Menambahkan 1 ke ID terakhir
        $data->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 201);
    }

    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        $data = DataRuangan::paginate(5);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function showId($id)
    {
        $data = DataRuangan::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'nama_ruangan' => 'required',
            'jumlah' => 'required|integer',
        ], [
            'nama_ruangan.required' => 'Nama Ruangan wajib diisi',
            'jumlah.required' => 'Jumlah Ruangan wajib diisi',
            'jumlah.integer' => 'Jumlah Ruangan harus berupa angka',
        ]);

        $data = DataRuangan::findOrFail($id);
        $data->nama_ruangan = $request->input('nama_ruangan');
        $data->jumlah = $request->input('jumlah');
        $data->save();

        return response()->json(['message' => 'Data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $data = DataRuangan::findOrFail($id);
    $data->delete();

    // Mengurutkan ID setelah dihapus
    $data = DataRuangan::orderBy('id', 'desc')->first();
    $lastId = $data->id;

    return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
