<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id', 'birth_place', 'dob', 'birth_time',
        'highest_education', 'education_field', 'specialization', 'institution', 'completion_year', 'additional_qualifications',
        'occupation_category', 'job_title', 'company_name', 'employment_type', 'industry', 'work_location', 'annual_income', 'experience_years',
        'gender', 'height', 'color', 'caste', 'marital_status', 'city_id', 'address', 'body_type', 'physical_status', 'mother_tongue', 'interests', 
        'hobbies', 'favorite_cuisine', 'favorite_music', 'sports', 'pet_preference', 'travel_preference', 'diet_preference', 'smoking_habits', 'drinking_habits', 
        'languages_known', 'life_motto', 'email', 'mobile', 'facebook_profile_url', 'instagram_profile_url', 'twitter_profile_url',
        'family_status', 'family_god', 'father_alive', 'mother_alive', 'parent_mobile', 'father_work', 'mother_work',
        'brothers_count', 'sisters_count', 'married_brothers', 'married_sisters', 'own_house', 'family_notes',
        'birth_star', 'rahu_ketu', 'chevvai', 'zodiac_sign', 'birth_lagnam', 'expectations', 'previous_marriage', 'additional_horoscope',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userImages()
    {
        return $this->hasMany(UserImages::class, 'user_id', 'user_id');
    }

    public function profileWatchHistories()
    {
        return $this->hasMany(ProfileWatchHistory::class, 'profile_id', 'user_id');
    }

    public function userHoroscopeImages()
    {
        return $this->hasMany(UserImages::class, 'user_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Masked Facebook Profile URL
    public function getFacebookProfileUrlAttribute($value)
    {
        if (! $value) {
            return null;
        }

        // Show only the domain + first 5 chars of username, mask the rest
        $parts = parse_url($value);
        $host  = $parts['host'] ?? '';
        $path  = $parts['path'] ?? '';

        if ($path) {
            $username = ltrim($path, '/');
            $masked   = substr($username, 0, 5) . str_repeat('*', max(strlen($username) - 5, 0));
            return $host . '/' . $masked;
        }

        return $host;
    }

    // Masked Instagram Profile URL
    public function getInstagramProfileUrlAttribute($value)
    {
        if (! $value) {
            return null;
        }

        $parts = parse_url($value);
        $host  = $parts['host'] ?? '';
        $path  = $parts['path'] ?? '';

        if ($path) {
            $username = ltrim($path, '/');
            $masked   = substr($username, 0, 3) . str_repeat('*', max(strlen($username) - 3, 0));
            return $host . '/' . $masked;
        }

        return $host;
    }

    // Masked Twitter Profile URL
    public function getTwitterProfileUrlAttribute($value)
    {
        if (! $value) {
            return null;
        }

        $parts = parse_url($value);
        $host  = $parts['host'] ?? '';
        $path  = $parts['path'] ?? '';

        if ($path) {
            $username = ltrim($path, '/');
            $masked   = substr($username, 0, 2) . str_repeat('*', max(strlen($username) - 2, 0));
            return $host . '/' . $masked;
        }

        return $host;
    }
}
