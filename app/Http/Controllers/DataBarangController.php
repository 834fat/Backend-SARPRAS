<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DataBarang::orderBy('nama_barang','desc')->paginate(5);
        return view ('DataBarang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('DataBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'=>'required',
            'jumlah'=>'required',
        ],[
            'nama_barang.required'=>'Nama Barang wajib diisi',
            'jumlah.required'=>'Jumlah Barang wajib diisi',
        ]);
        $data = [
            'nama_barang'=>$request->nama_barang,
            'jumlah'=>$request->jumlah,
        ];
        DataBarang::create($data);
        return redirect()->to('DataBarang')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DataBarang::where('nama_barang', $id)->first();
        return view('DataBarang.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_barang'=>'required',
            'jumlah'=>'required',
        ],[
            'nama_barang.required'=>'Nama Barang wajib diisi',
            'jumlah.required'=>'Jumlah Barang wajib diisi',
        ]);
        $data = [
            'nama_barang'=>$request->nama_barang,
            'jumlah'=>$request->jumlah,
        ];
        DataBarang::where('nama_barang', $id)->update($data);
        return redirect()->to('DataBarang')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DataBarang::where('nama_barang', $id)->delete();
        return redirect()->to('DataBarang')->with('success', 'Data Berhasil Dihapus');
    }
}
