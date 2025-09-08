<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id', 'birth_place', 'dob', 'birth_time',
        'highest_education', 'education_field', 'specialization', 'institution', 'completion_year',
        'occupation_category', 'job_title', 'company_name', 'employment_type', 'industry', 'work_location', 'annual_income', 'experience_years',
        'gender', 'height', 'color', 'caste', 'marital_status', 'city', 'address', 'body_type', 'physical_status', 'mother_tongue',
        'family_status', 'family_god', 'father_alive', 'mother_alive', 'parent_mobile', 'father_work', 'mother_work',
        'brothers_count', 'sisters_count', 'married_brothers', 'married_sisters', 'own_house', 'family_notes',
        'birth_star', 'rahu_ketu', 'chevvai', 'zodiac_sign', 'birth_lagnam', 'expectations', 'previous_marriage', 'additional_horoscope',
    ];
}
