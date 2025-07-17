<?php

use App\Models\User;
use App\Models\VehicleColor;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
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
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(VehicleMake::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(VehicleModel::class)->constrained()->onDelete('cascade');
            $table->year('make_year');
            $table->integer('number_of_seats');
            $table->foreignIdFor(VehicleColor::class)->constrained()->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('license_plate')->unique();
            $table->softDeletes();
            $table->timestamps();
            $table->index('license_plate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vehicles');
    }
};
