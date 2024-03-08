<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'nidn',
        'nama',
        'judul',
        'gambar',
        'sub_gambar',
        'deskripsi',
        'link',
    ];
}
