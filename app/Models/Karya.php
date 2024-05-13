<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $table = 'tb_karyas';

    protected $primaryKey = 'karyas_id';

    protected $fillable = [
        'judul', 'users_id'
    ];
}
