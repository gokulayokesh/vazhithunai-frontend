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
        Schema::create('shortlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id') // The one who is shortlisting
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('shortlisted_user_id') // The profile being shortlisted
                ->constrained('users')
                ->onDelete('cascade');

            $table->timestamps();

            // Prevent duplicate shortlists
            $table->unique(['user_id', 'shortlisted_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortlists');
    }
};
