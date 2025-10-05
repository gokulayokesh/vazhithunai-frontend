<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'identifier',
        'name',
        'email',
        'mobile',
        'password',
        'google_id',
        'avatar',
        'otp',
        'otp_created_at',
        'profile_completed',
        'last_seen',
        'email_verified_at',
        'view_profile_count',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'mobile' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed', 'last_seen' => 'datetime',
        ];
    }

    public function userDetails()
    {
        return $this->hasOne(UserDetails::class);
    }

    public function userImages()
    {
        return $this->hasMany(UserImages::class);
    }

    public function shortlistedUsers()
    {
        return $this->belongsToMany(User::class, 'shortlists', 'user_id', 'shortlisted_user_id')
            ->with('userDetails', 'userImages');
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            // Generate a random alphanumeric string (A–Z, 0–9)
            $pool = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $raw = strtoupper(Str::random(12, $pool)); // Laravel 11+ supports pool argument
    
            // If your Laravel version doesn’t support pool, use:
            // $raw = collect(str_split($pool))
            //     ->random(12)
            //     ->implode('');
    
            // Format: VTM-XXXX-YYYY (letters + numbers)
            $user->identifier = 'VTM-' . substr($raw, 4, 4) . '-' . substr($raw, 8, 4);
        });
    }

    public static function getIdByIdentifier(string $identifier): ?int
    {
        return static::where('identifier', $identifier)->value('id');
    }

    // Masked Email
    public function getEmailAttribute($value)
    {
        if (! $value) {
            return null;
        }

        $parts = explode('@', $value);
        $name = substr($parts[0], 0, 3).str_repeat('*', max(strlen($parts[0]) - 3, 0));

        return $name.'@'.$parts[1];
    }

    // Masked Mobile
    public function getMobileAttribute($value)
    {
        if (! $value) {
            return null;
        }

        $len = strlen($value);
        if ($len <= 4) {
            return str_repeat('*', $len);
        }

        return substr($value, 0, 2).str_repeat('*', $len - 4).substr($value, -2);
    }

    public function isOnline()
    {
        return $this->last_seen && $this->last_seen->gt(now()->subMinutes(2));
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'user_one_id')
            ->orWhere('user_two_id', $this->id);
    }

    // app/Models/User.php
    public function subscriptions()
    {
        return $this->hasMany(SubscriptionHistory::class, 'user_id', 'id');
    }

    public function latestActiveSubscription()
    {
        $today = now()->toDateString();

        return $this->hasOne(SubscriptionHistory::class)
            ->where('status', 'active')
            ->whereDate('start_date', '<=', $today)
            ->whereDate('end_date', '>=', $today)
            ->latest('start_date');
    }

    public function profileWatchHistory()
    {
        return $this->belongsTo(User::class, 'viewer_id');
    }

    // app/Models/User.php
    public function referralsGiven() {
        return $this->hasMany(Referral::class, 'referrer_id');
    }

    public function referralReceived() {
        return $this->hasOne(Referral::class, 'referred_user_id');
    }
}
