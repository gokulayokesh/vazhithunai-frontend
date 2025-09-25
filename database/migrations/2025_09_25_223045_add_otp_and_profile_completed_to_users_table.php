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
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp', 10)->nullable()->after('password');
            $table->timestamp('otp_created_at')->nullable()->after('otp');
            $table->boolean('profile_completed')->default(false)->after('otp_created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['otp', 'otp_created_at', 'profile_completed']);
        });
    }
};
