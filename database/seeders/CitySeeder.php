<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Akmenė', 'Alytus', 'Anykščiai', 'Ariogala', 'Baltoji Vokė', 'Birštonas', 'Biržai', 'Daugai', 'Druskininkai',
            'Dūkštas', 'Dusetos', 'Eišiškės', 'Elektrėnai', 'Ežerėlis', 'Gargždai', 'Garliava', 'Gelgaudiškis',
            'Grigiškės', 'Ignalina', 'Jieznas', 'Jonava', 'Joniškėlis', 'Joniškis', 'Jurbarkas', 'Kaišiadorys',
            'Kalvarija', 'Kaunas', 'Kavarskas', 'Kazlų Rūda', 'Kėdainiai', 'Kelmė', 'Kybartai', 'Klaipėda',
            'Kretinga', 'Kudirkos Naumiestis', 'Kupiškis', 'Kuršėnai', 'Lazdijai', 'Lentvaris', 'Linkuva', 'Marijampolė',
            'Mažeikiai', 'Molėtai', 'Naujoji Akmenė', 'Nemenčinė', 'Neringa', 'Obeliai', 'Pabradė', 'Pagėgiai',
            'Pakruojis', 'Palanga', 'Pandėlys', 'Panemunė', 'Panevėžys', 'Pasvalys', 'Plungė', 'Priekulė', 'Prienai',
            'Radviliškis', 'Ramygala', 'Raseiniai', 'Rietavas', 'Rokiškis', 'Rūdiškės', 'Salantai', 'Seda', 'Simnas',
            'Skaudvilė', 'Skuodas', 'Smalininkai', 'Subačius', 'Šakiai', 'Šalčininkai', 'Šeduva', 'Šiauliai', 'Šilalė',
            'Šilutė', 'Širvintos', 'Švenčionėliai', 'Švenčionys', 'Tauragė', 'Telšiai', 'Tytuvėnai', 'Trakai',
            'Troškūnai', 'Ukmergė', 'Utena', 'Užventis', 'Vabalninkas', 'Varėna', 'Varniai', 'Veisiejai', 'Venta',
            'Viekšniai', 'Vievis', 'Vilkaviškis', 'Vilkija', 'Vilnius', 'Virbalis', 'Visaginas', 'Zarasai', 'Žagarė', 'Žiežmariai',
        ];
        $lithuania = Country::where('code', 'LT')->first();
        foreach ($cities as $cityName) {
            City::create([
                'name' => $cityName,
                'country_id' => $lithuania->id,
            ]);
        }

    }
}
