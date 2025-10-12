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
        Schema::table('user_details', function (Blueprint $table) {
            $table->string('highest_education')->nullable()->default(null)->change();
            $table->string('education_field')->nullable()->default(null)->change();
            $table->string('occupation_category')->nullable()->default(null)->change();
            $table->string('job_title')->nullable()->default(null)->change();
            $table->string('work_location')->nullable()->default(null)->change();
            $table->string('gender')->nullable()->default(null)->change();
            $table->string('height')->nullable()->default(null)->change();

            $table->string('caste')->nullable()->default(null)->change();
            $table->string('marital_status')->nullable()->default(null)->change();
            $table->string('address')->nullable()->default(null)->change();
            $table->string('mother_tongue')->nullable()->default(null)->change();
            $table->string('family_status')->nullable()->default(null)->change();
            $table->string('father_alive')->nullable()->default(null)->change();
            $table->string('mother_alive')->nullable()->default(null)->change();

            $table->string('parent_mobile')->nullable()->default(null)->change();
            $table->string('own_house')->nullable()->default(null)->change();
            $table->string('birth_star')->nullable()->default(null)->change();
            $table->string('rahu_ketu')->nullable()->default(null)->change();
            $table->string('chevvai')->nullable()->default(null)->change();
            $table->string('zodiac_sign')->nullable()->default(null)->change();
            $table->string('birth_lagnam')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
        });
    }
};
