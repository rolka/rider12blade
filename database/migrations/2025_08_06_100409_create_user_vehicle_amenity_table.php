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
        Schema::create('user_vehicle_amenity', function (Blueprint $table) {
            // Foreign key to the user_vehicles table
            $table->foreignId('user_vehicle_id')->constrained()->onDelete('cascade');
            // Foreign key to the amenities table
            $table->foreignId('vehicle_amenity_id')->constrained()->onDelete('cascade');

            // Make the combination of user_vehicle_id and amenity_id unique
            $table->primary(['user_vehicle_id', 'vehicle_amenity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vehicle_amenity');
    }
};
