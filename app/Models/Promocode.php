<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promocode extends Model
{
    protected $fillable = [
        'code',             // unique promocode string
        'subscription_id',          // associated subscription plan
        'max_uses',         // total allowed uses
        'used_count',       // current usage count
        'expires_at',       // optional expiry date
    ];

    protected $dates = ['expires_at'];

    public function redemptions(): HasMany
    {
        return $this->hasMany(PromocodeRedemption::class);
    }

    public function plan()  
    {
        return $this->belongsTo(Subscription::class);
    }
}
