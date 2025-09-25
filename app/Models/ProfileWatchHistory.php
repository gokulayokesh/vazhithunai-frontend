<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileWatchHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'viewer_id',
        'profile_id',
        'view_count',
    ];

    // The user who viewed
    public function viewer()
    {
        return $this->belongsTo(User::class, 'viewer_id');
    }

    // The profile being viewed
    public function profile()
    {
        return $this->belongsTo(User::class, 'profile_id');
    }
}
