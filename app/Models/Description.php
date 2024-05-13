<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    protected $table = 'tb-description';

    protected $primaryKey = 'descriptionID';

    protected $fillable = [
        'metaID', 'productID',  'description', 'orderNumber'
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
