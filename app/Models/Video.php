<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'tb-videos';

    protected $primaryKey = 'videosID';

    protected $fillable = [
        'metaID', 'productID', 'videoTitle'
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
