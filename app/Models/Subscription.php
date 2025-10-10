<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'name',
        'validity_days',
        'price',
        'profile_view_count'
    ];
}
