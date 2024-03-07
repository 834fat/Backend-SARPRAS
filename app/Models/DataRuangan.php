<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRuangan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_ruangan', 'jumlah'];
    protected $table = 'data_ruangan';
}