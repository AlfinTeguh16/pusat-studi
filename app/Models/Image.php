<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'tb-images';

    protected $primaryKey = 'imagesID';

    protected $fillable = [
        'metaID', 'productID', 'imageTitle', 'orderNumber'
    ];

    public function metadata()
    {
        return $this->belongsTo(Metadata::class, 'metaID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
