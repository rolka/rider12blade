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
                'icon' => 'fan' // Changed from 'phosphor-fan' to 'fan'
            ],
            [
                'name' => ['en' => 'Bluetooth, AUX, USB', 'lt' => 'Bluetooth, AUX, USB'],
                'slug' => 'bluetooth-aux-usb',
                'icon' => 'bluetooth-light' // Changed from 'phosphor-bluetooth-light' to 'bluetooth-light'
            ],
            [
                'name' => ['en' => 'GPS Navigation', 'lt' => 'GPS navigacija'],
                'slug' => 'gps-navigation',
                'icon' => 'compass-light' // Changed from 'phosphor-compass-light' to 'compass-light'
            ],
            [
                'name' => ['en' => 'Heated Seats', 'lt' => 'Šildomos sėdynės'],
                'slug' => 'heated-seats',
                'icon' => 'seat-light' // Changed from 'phosphor-seat-light' to 'seat-light'
            ],
        ];

        foreach ($amenities as $amenity) {
            VehicleAmenity::firstOrCreate(['slug' => $amenity['slug']], $amenity);
        }
    }
}
