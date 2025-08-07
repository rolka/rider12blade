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
        Schema::table('user_vehicles', function (Blueprint $table) {
            $table->dropColumn('number_of_seats');
            $table->dropColumn('license_plate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_vehicles', function (Blueprint $table) {
            $table->integer('number_of_seats');
            $table->string('license_plate', 20)->unique();
        });
    }
};
