<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                'code' => 'LT',
                'name' => ['en' => 'Lithuania', 'pl' => 'Litwa', 'lt' => 'Lietuva'],
            ],
            [
                'code' => 'PL',
                'name' => ['en' => 'Poland', 'pl' => 'Polska', 'lt' => 'Lenkija'],
            ],
            [
                'code' => 'GB',
                'name' => ['en' => 'United Kingdom', 'pl' => 'Zjednoczone Królestwo', 'lt' => 'Jungtinė Karalystė'],
            ],
        ];

        foreach ($countries as $country) {
            Country::updateOrCreate(['code' => $country['code']], $country);
        }

    }
}
