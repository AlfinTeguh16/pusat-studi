<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = "tb_dashboard_content";

    protected $fillable = ["image", "imageDescription", "team", "imgtype"];
}
