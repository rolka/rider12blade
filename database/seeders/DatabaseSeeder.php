<?php

namespace Database\Seeders;

use App\Models\Ride;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserVehicle;
use App\Models\VehicleMake;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'first_name' => 'Admin',
        //     'surname' => 'Adminovich',
        //     'email' => 'test@example.com',
        // ]);
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'first_name' => 'Admin',
                'surname' => 'Adminovich',
                'phone' => '?', // replace or remove if optional
                'photo' => Str::of('https://i.pravatar.cc/150?img='. rand(1, 70)),
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // set password here
                // 'remember_token' => Str::random(10),
            ]
        );

        $this->call(VehicleMakeSeeder::class);
        $this->call(VehicleModelSeeder::class);
        $this->call(VehicleTypeSeeder::class);
        $this->call(VehicleColorSeeder::class);
        UserVehicle::factory()->count(10)->create();
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        Ride::factory()->count(10)->create();

    }
}
