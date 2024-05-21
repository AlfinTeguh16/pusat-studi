<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventItems extends Model
{
    use HasFactory;

    protected $table = 'tb_events_items';

    protected $primaryKey = 'events_items_id';

    protected $fillable = [
        'events_id','label', 'jenis', 'content', 'order'
    ];
}
