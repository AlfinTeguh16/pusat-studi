<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'tb_user_activitys';

    protected $fillable = ['users_id', 'activity', 'created_at'];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

}
