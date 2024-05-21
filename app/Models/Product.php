<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb_products';

    protected $primaryKey = 'products_id';

    protected $fillable = [
        'judul', 'users_id'
    ];

}
