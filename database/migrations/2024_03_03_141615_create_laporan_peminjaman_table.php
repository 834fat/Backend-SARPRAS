<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_peminjaman');
            $table->string('nama_barang');
            $table->integer('jumlah_pinjam');
            $table->string('jenis_barang');
            $table->string('nama_peminjam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_peminjaman');
    }
}
