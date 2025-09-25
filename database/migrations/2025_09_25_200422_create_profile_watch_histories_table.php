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
        Schema::create('profile_watch_histories', function (Blueprint $table) {
            $table->id();

            // The user who is viewing
            $table->foreignId('viewer_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // The profile being viewed
            $table->foreignId('profile_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Optional: track how many times the same viewer viewed this profile
            $table->unsignedInteger('view_count')->default(1);

            $table->timestamps();

            // Prevent duplicate rows for same viewer/profile combo
            $table->unique(['viewer_id', 'profile_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_watch_histories');
    }
};
