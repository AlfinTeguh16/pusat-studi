<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $table = 'tb-creator';

    protected $primaryKey = 'creatorID';

    protected $fillable = [
        'metaID', 'creatorName', 'creatorNationality', 'creatorStyle', 'orderNumber'
    ];

    public function metadata()
    {
        return $this->belongsTo(Metadata::class, 'metaID');
    }
}
