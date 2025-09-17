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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->string('order_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable(); // link to users table
            $table->integer('amount'); // in paise
            $table->string('status')->default('initiated'); // initiated, success, failed
            $table->json('gateway_response')->nullable(); // store raw PhonePe response
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
