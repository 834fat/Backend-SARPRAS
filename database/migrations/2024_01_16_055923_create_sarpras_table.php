<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_sarpras', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('pinjam_barang')->nullable();
            $table->date('tgl_peminjaman')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sarpras');
    }
};
