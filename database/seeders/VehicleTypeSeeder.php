<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['id' => 1, 'name' => ['en' => 'Hatchback', 'lt' => 'Hečbekas']],
            ['id' => 2, 'name' => ['en' => 'Sedan',     'lt' => 'Sedanas']],
            ['id' => 3, 'name' => ['en' => 'MPV',       'lt' => 'Vienatūris']],
            ['id' => 4, 'name' => ['en' => 'SUV',       'lt' => 'Visureigis']],
            ['id' => 5, 'name' => ['en' => 'Crossover', 'lt' => 'Krosoveris']],
            ['id' => 6, 'name' => ['en' => 'Coupe',     'lt' => 'Kupė']],
            ['id' => 7, 'name' => ['en' => 'Convertible','lt' => 'Kabrioletas']],
        ];
        // $type = VehicleType::first();
        // echo $type->getTranslation('name', 'lt'); // Hečbekas
        // echo $type->getTranslation('name', 'en'); // Hatchback

        foreach ($types as $type) {
            VehicleType::updateOrCreate(['id' => $type['id']], [
                'name' => $type['name']
            ]);
        }
    }
}
