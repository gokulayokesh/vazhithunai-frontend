<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'tamil_name',
        'status',
    ];

    // Optional: relationship to cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
