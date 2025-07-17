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
            ['name' => ['en' => 'Hatchback', 'lt' => 'Hečbekas']],
            ['name' => ['en' => 'Sedan',     'lt' => 'Sedanas']],
            ['name' => ['en' => 'MPV',       'lt' => 'Vienatūris']],
            ['name' => ['en' => 'SUV',       'lt' => 'Visureigis']],
            ['name' => ['en' => 'Crossover', 'lt' => 'Krosoveris']],
            ['name' => ['en' => 'Coupe',     'lt' => 'Kupė']],
            ['name' => ['en' => 'Convertible','lt' => 'Kabrioletas']],
        ];
        // $type = VehicleType::first();
        // echo $type->getTranslation('name', 'lt'); // Hečbekas
        // echo $type->getTranslation('name', 'en'); // Hatchback
        foreach ($types as $type) {
            VehicleType::updateOrCreate(
                ['name->en' => $type['name']['en']],
                $type
            );
        }
    }
}
