<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    protected $table = 'tb_metadatas';

    protected $primaryKey = 'metadatas_id';

    protected $fillable = [
        'karyas_id', 'jenis', 'content', 'order'
    ];

}
