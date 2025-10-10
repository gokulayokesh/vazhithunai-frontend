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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique(); // Unique promocode string
            $table->unsignedBigInteger('subscription_id'); // ID of the subscription plan
            $table->unsignedInteger('max_uses')->default(1); // Max allowed redemptions
            $table->unsignedInteger('used_count')->default(0); // Current redemption count
            $table->timestamp('expires_at')->nullable(); // Optional expiry

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promocodes');
    }
};
