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
        'password',
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
            $raw = Str::lower(Str::random(12));
            $user->identifier = 'VTM-'.substr($raw, 4, 4).'-'.substr($raw, 8, 4);
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
}
