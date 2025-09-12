<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shortlisted_user_id',
    ];

    // Who created the shortlist
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The profile that was shortlisted
    public function shortlistedUser()
    {
        return $this->belongsTo(User::class, 'shortlisted_user_id');
    }
}
