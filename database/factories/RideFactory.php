<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use App\Models\UserVehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ride>
 */
class RideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // or an existing user ID
            'user_vehicle_id' => fn() => UserVehicle::factory()->create()->id,
            'departure_id' => City::inRandomOrder()->value('id'),
            'destination_id' => City::inRandomOrder()->value('id'),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'available_seats' => $this->faker->numberBetween(1, 7),
            'date_time' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
