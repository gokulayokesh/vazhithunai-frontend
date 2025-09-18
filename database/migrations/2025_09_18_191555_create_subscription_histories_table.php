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
        Schema::create('subscription_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade'); // if user is deleted, history goes too

            $table->string('plan_name'); // e.g. "Gold", "Premium"
            $table->string('plan_code')->nullable(); // internal code if needed
            $table->decimal('amount', 10, 2)->nullable(); // subscription fee

            $table->date('start_date');
            $table->date('end_date'); // null if ongoing

            $table->enum('status', ['active', 'expired', 'cancelled', 'pending'])
                ->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_histories');
    }
};
