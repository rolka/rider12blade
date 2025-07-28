<?php

use App\Models\City;
use App\Models\User;
use App\Models\UserVehicle;
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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(UserVehicle::class)->constrained()->onDelete('cascade');

            // Use foreignIdFor but define constraint manually
            $table->foreignIdFor(City::class, 'departure_id');
            $table->foreignIdFor(City::class, 'destination_id');

            $table->decimal('price', 8, 2);
            $table->unsignedTinyInteger('available_seats');
            $table->dateTimeTz('date_time');

            $table->softDeletes();
            $table->timestamps();

            // Manually define foreign key constraints for both cities
            $table->foreign('departure_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
