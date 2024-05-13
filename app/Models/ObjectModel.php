<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectModel extends Model
{
    use HasFactory;

    protected $table = 'tb-object';

    protected $primaryKey = 'objectID';

    protected $fillable = [
        'metaID',  'objectOrnament', 'objectWidth', 'objectHeight', 'objectVolume', 'objectNation', 'objectProvince', 'orderNumber'
    ];

    public function metadata()
    {
        return $this->belongsTo(Metadata::class, 'metaID');
    }
}
