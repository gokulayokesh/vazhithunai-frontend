<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Birth Details
            $table->string('birth_place');
            $table->date('dob');
            $table->string('birth_time')->nullable();

            // Education & Occupation
            $table->string('highest_education');
            $table->string('education_field');
            $table->string('specialization')->nullable();
            $table->string('institution')->nullable();
            $table->year('completion_year')->nullable();
            $table->string('occupation_category');
            $table->string('job_title');
            $table->string('company_name')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('industry')->nullable();
            $table->string('work_location');
            $table->string('annual_income')->nullable();
            $table->integer('experience_years')->nullable();

            // Personal Details
            $table->string('gender');
            $table->string('height');
            $table->string('color')->nullable();
            $table->string('caste');
            $table->string('marital_status');
            $table->string('city');
            $table->text('address');
            $table->string('body_type')->nullable();
            $table->string('physical_status')->nullable();
            $table->string('mother_tongue');
            $table->string('interests')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('favorite_cuisine')->nullable();
            $table->string('favorite_music')->nullable();
            $table->string('sports')->nullable();
            $table->string('pet_preference')->nullable();
            $table->string('travel_preference')->nullable();
            $table->string('diet_preference')->nullable();
            $table->string('smoking_habits')->nullable();
            $table->string('drinking_habits')->nullable();
            $table->string('languages_known')->nullable();
            $table->string('life_motto')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();

            // Family Details
            $table->string('family_status');
            $table->string('family_god')->nullable();
            $table->string('father_alive');
            $table->string('mother_alive');
            $table->string('parent_mobile');
            $table->string('father_work')->nullable();
            $table->string('mother_work')->nullable();
            $table->integer('brothers_count')->nullable();
            $table->integer('sisters_count')->nullable();
            $table->integer('married_brothers')->nullable();
            $table->integer('married_sisters')->nullable();
            $table->string('own_house');
            $table->text('family_notes')->nullable();

            // Horoscope Details
            $table->string('birth_star');
            $table->string('rahu_ketu');
            $table->string('chevvai');
            $table->string('zodiac_sign');
            $table->string('birth_lagnam');
            $table->text('expectations')->nullable();
            $table->text('previous_marriage')->nullable();
            $table->text('additional_horoscope')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
