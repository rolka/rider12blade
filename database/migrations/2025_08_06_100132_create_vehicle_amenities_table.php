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
        Schema::create('vehicle_amenities', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // e.g., 'Air Conditioning', 'Bluetooth, AUX, USB'
            $table->string('slug')->unique(); // A URL-friendly version, e.g., 'air-conditioning'
            $table->string('icon')->nullable(); // Optional: store the icon name (e.g., 'phosphor-fan')
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_amenities');
    }
};
