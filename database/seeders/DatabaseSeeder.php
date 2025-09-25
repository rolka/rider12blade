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
            ['email' => 'rzabulis@gmail.com'],
            [
                'first_name' => 'Rolandas',
                'surname' => 'Zabulis',
                'phone' => null,
                'photo' => Str::of('https://i.pravatar.cc/150?img='. rand(1, 70)),
                'email_verified_at' => now(),
                'password' => bcrypt('password'), // set password here
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
        Ride::factory(3)->scheduled()->create(['user_id' => 1]);
        Ride::factory(2)->completed()->create(['user_id' => 1]);
        Ride::factory(2)->cancelled()->create(['user_id' => 1]);
        $this->call(VehicleAmenitySeeder::class);
        $this->call(LanguageSeeder::class);

    }
}
