<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'tb-materials';

    protected $primaryKey = 'materialsID';

    protected $fillable = [
        'metaID', 'orderNumber', 'mainMaterial', 'additionalMaterial', 'creationTechnique'
    ];

    public function metadata()
    {
        return $this->belongsTo(Metadata::class, 'metaID');
    }
}
