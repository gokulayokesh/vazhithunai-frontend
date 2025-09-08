<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHoroscopeImages extends Model
{
    protected $fillable = ['user_id', 'image_path', 'type'];
}
