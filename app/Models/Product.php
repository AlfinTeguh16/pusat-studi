<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tb-product';

    protected $primaryKey = 'productID';

    protected $fillable = [
        'nidn', 'username', 'productTitle'
    ];

    public function metadata()
    {
        return $this->hasOne(Metadata::class, 'nidn');
    }
}
