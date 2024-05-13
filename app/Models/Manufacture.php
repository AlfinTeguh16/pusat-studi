<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    protected $table = 'tb-manufacture';

    protected $primaryKey = 'manufactureID';

    protected $fillable = [
        'metaID', 'manufactureYear', 'manufactureStart', 'manufactureFinish', 'orderNumber'
    ];

    public function metadata()
    {
        return $this->belongsTo(Metadata::class, 'metaID');
    }
}
