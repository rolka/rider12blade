<?php

namespace Database\Factories;

use App\Enums\RideStatus;
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
        $dateTime = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $status = $dateTime > new \DateTimeImmutable('now')
            ? RideStatus::Scheduled
            : $this->faker->randomElement([RideStatus::Completed, RideStatus::Cancelled]);

        return [
            'user_id' => User::factory(),
            'user_vehicle_id' => fn () => UserVehicle::factory()->create()->id,
            'departure_id' => City::inRandomOrder()->value('id'),
            'destination_id' => City::inRandomOrder()->value('id'),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'total_seats' => $this->faker->numberBetween(1, 7),
            'available_seats' => fn (array $attributes) => $this->faker->numberBetween(0, $attributes['total_seats']),
            'date_time' => $dateTime,
            'status' => $status,
        ];
    }
    public function scheduled(): static
    {
        return $this->state(fn (array $attributes) => [
            'date_time' => $this->faker->dateTimeBetween('+1 day', '+1 month'),
            'status' => RideStatus::Scheduled->value,
        ]);
    }
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'date_time' => $this->faker->dateTimeBetween('-1 month', '-1 day'),
            'status' => RideStatus::Completed->value,
        ]);
    }
    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'date_time' => $this->faker->dateTimeBetween('-1 month', '-1 day'),
            'status' => RideStatus::Cancelled->value,
        ]);
    }
}
