<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'tb-event';

    protected $fillable = [
        'nidn',
        'nama',
        'judul',
        'gambar',
        'sub_gambar',
        'deskripsi',
        'tempat',
        'tanggal_mulai',
        'tanggal_selesai',
        'link',
    ];

    public $timestamps = true;

}
