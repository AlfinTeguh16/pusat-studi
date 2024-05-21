<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'tb_events';

    protected $primaryKey = 'events_id';

    protected $fillable = [
        'judul', 'users_id'
    ];

}
