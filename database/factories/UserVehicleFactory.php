<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserVehicle;
use App\Models\VehicleColor;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserVehicleFactory extends Factory
{
    protected $model = UserVehicle::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'), // safe even if 1 user
            'vehicle_make_id' => VehicleMake::inRandomOrder()->value('id'),
            'vehicle_model_id' => VehicleModel::inRandomOrder()->value('id'),
            'make_year' => $this->faker->year(),
            // 'number_of_seats' => $this->faker->numberBetween(2, 7),
            'vehicle_color_id' => VehicleColor::inRandomOrder()->value('id'),
            'photo' => Str::of('https://i.pravatar.cc/150?img='. rand(1, 70)),
            // 'license_plate' => strtoupper($this->faker->bothify('??####')),
        ];
    }
}
