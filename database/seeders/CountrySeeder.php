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
        Country::create([
            'code' => 'LT',
            'name' => ['en' => 'Lithuania', 'pl' => 'Litwa', 'lt' => 'Lietuva'],
        ]);
        Country::create([
            'code' => 'PL',
            'name' => ['en' => 'Poland', 'pl' => 'Polska', 'lt' => 'Lenkija'],
        ]);

    }
}
