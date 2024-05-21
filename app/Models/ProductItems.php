<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    use HasFactory;

    protected $table = 'tb_products_items';

    protected $primaryKey = 'products_items_id';

    protected $fillable = [
        'products_id','label', 'jenis', 'content', 'order'
    ];
}
