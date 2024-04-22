<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model3D extends Model
{
    use HasFactory;

    protected $table = 'tb-model_3d';

    protected $primaryKey = 'model_3dID';

    protected $fillable = [
        'metaID', 'productID', 'orderNumber', 'model_3d', 'model_3dDescription'
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
