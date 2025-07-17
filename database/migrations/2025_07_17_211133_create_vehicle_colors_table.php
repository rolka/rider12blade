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
        Schema::create('vehicle_colors', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // Color name (e.g., "Black")
            $table->string('hex_code')->nullable(); // Optional, for UI (e.g., "#000000")
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_colors');
    }
};
