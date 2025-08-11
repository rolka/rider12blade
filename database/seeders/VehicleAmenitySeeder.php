<?php

namespace Database\Seeders;

use App\Models\VehicleAmenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [
            [
                'name' => ['en' => 'Air Conditioning', 'lt' => 'Oro kondicionierius'],
                'slug' => 'air-conditioning',
                'icon' => 'fan'
            ],
            [
                'name' => ['en' => 'Bluetooth, AUX, USB', 'lt' => 'Bluetooth, AUX, USB'],
                'slug' => 'bluetooth-aux-usb',
                'icon' => 'bluetooth-light'
            ],
            [
                'name' => ['en' => 'GPS Navigation', 'lt' => 'GPS navigacija'],
                'slug' => 'gps-navigation',
                'icon' => 'compass-light'
            ],
            [
                'name' => ['en' => 'Heated Seats', 'lt' => 'Šildomos sėdynės'],
                'slug' => 'heated-seats',
                'icon' => 'seat-light'
            ],
            [
                'name' => ['en' => 'Non smoking', 'lt' => 'Automobilyje nerūkoma'],
                'slug' => 'non-smoking',
                'icon' => 'cigarette-slash-light'
            ],
            [
                'name' => ['en' => 'Child-friendly', 'lt' => 'Draugiškas vaikams'],
                'slug' => 'child-friendly',
                'icon' => 'baby-light'
            ],
            [
                'name' => ['en' => 'Pet-friendly', 'lt' => 'Draugiškas gyvūnams'],
                'slug' => 'pet-friendly',
                'icon' => 'paw-print-light'
            ]
        ];

        foreach ($amenities as $amenity) {
            VehicleAmenity::firstOrCreate(['slug' => $amenity['slug']], $amenity);
        }
    }
}
