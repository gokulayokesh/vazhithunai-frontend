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
            $table->string('father_name')->nullable()->default(null)->after('father_alive');
            $table->string('mother_name')->nullable()->default(null)->after('mother_alive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            $table->dropColumn(['father_name', 'mother_name']);
            $table->dropColumn('guardian_name');
        });
    }
};
