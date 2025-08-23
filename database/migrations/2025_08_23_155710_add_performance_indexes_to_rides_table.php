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
        Schema::table('rides', function (Blueprint $table) {
            // Add indexes for commonly queried columns
            $table->index(['date_time']);
            $table->index(['departure_id', 'date_time']);
            $table->index(['user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rides', function (Blueprint $table) {
            $table->dropIndex(['date_time']);
            $table->dropIndex(['departure_id', 'date_time']);
            $table->dropIndex(['user_id']);
        });
    }
};
