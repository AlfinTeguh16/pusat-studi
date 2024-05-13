<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model3D extends Model
{
    use HasFactory;

    protected $table = 'tb_model_3d';

    protected $primaryKey = 'model_3dID';

    protected $fillable = [
        'metaID', 'productID',  'model_3d', 'orderNumber'
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
