<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    /** @use HasFactory<\Database\Factories\ReferralFactory> */
    use HasFactory;

    protected $fillable = [
        'referrer_id', 'referred_user_id', 'referral_code', 'status', 'reward_points'
    ];

    public function referrer() {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referredUser() {
        return $this->belongsTo(User::class, 'referred_user_id');
    }
}
