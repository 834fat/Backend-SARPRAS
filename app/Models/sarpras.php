<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sarpras extends Model
{
    use HasFactory;

    protected $table = 'tbl_sarpras';

    protected $fillable = [
        'id_user', 'pinjam_barang', 'tgl_peminjaman', 'keterangan'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
