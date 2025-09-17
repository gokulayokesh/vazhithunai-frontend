<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'transaction_id',
        'order_id',
        'user_id',
        'amount',
        'status',
        'gateway_response',
    ];

    protected $casts = [
        'gateway_response' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
