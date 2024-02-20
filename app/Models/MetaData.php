<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    protected $table = 'meta_data';

    protected $fillable = [
        'nidn',
        'nama',
        'judul',
        'gambar',
        'deskripsi',
        'model_3d',
        'nama_benda',
        'tahun_pembuatan',
        'periode_pembuatan_awal',
        'periode_pembuatan_akhir',
        'provinsi',
        'kabupaten',
        'kecamatan',
    ];
}
