<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromocodeRedemption extends Model
{
    protected $fillable = [
        'user_id',
        'promocode_id',
    ];

    public function promocode()
    {
        return $this->belongsTo(Promocode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
