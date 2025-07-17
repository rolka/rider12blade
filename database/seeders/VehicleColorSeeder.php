<?php

namespace Database\Seeders;

use App\Models\VehicleColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                'name' => ['en' => 'Black',     'lt' => 'Juoda'],
                'hex_code' => '#000000'
            ],
            [
                'name' => ['en' => 'White',     'lt' => 'Balta'],
                'hex_code' => '#FFFFFF'
            ],
            [
                'name' => ['en' => 'Silver',    'lt' => 'Sidabrinė'],
                'hex_code' => '#C0C0C0'
            ],
            [
                'name' => ['en' => 'Red',       'lt' => 'Raudona'],
                'hex_code' => '#FF0000'
            ],
            [
                'name' => ['en' => 'Blue',      'lt' => 'Mėlyna'],
                'hex_code' => '#0000FF'
            ],
            [
                'name' => ['en' => 'Green',     'lt' => 'Žalia'],
                'hex_code' => '#008000'
            ],
            [
                'name' => ['en' => 'Gray',      'lt' => 'Pilka'],
                'hex_code' => '#808080'
            ],
            [
                'name' => ['en' => 'Beige',     'lt' => 'Smėlio'],
                'hex_code' => '#F5F5DC'
            ],
            [
                'name' => ['en' => 'Brown',     'lt' => 'Ruda'],
                'hex_code' => '#8B4513'
            ],
            [
                'name' => ['en' => 'Yellow',    'lt' => 'Geltona'],
                'hex_code' => '#FFFF00'
            ],
        ];
        foreach ($colors as $color) {
            VehicleColor::updateOrCreate(
                ['hex_code' => $color['hex_code']],
                $color
            );
        }

    }
}
