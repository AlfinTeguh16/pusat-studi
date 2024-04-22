<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    protected $table = 'tb-metadata';

    protected $primaryKey = 'metaID';

    protected $fillable = [
        'nidn', 'username', 'metaTitle'
    ];
}
