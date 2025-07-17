<?php

namespace Database\Seeders;

use App\Models\VehicleMake;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makes = [
            ['name' => 'Acura', 'code' => 'ACURA'],
            ['name' => 'Alfa Romeo', 'code' => 'ALFA'],
            ['name' => 'AMC', 'code' => 'AMC'],
            ['name' => 'Aston Martin', 'code' => 'ASTON'],
            ['name' => 'Audi', 'code' => 'AUDI'],
            ['name' => 'Avanti', 'code' => 'AVANTI'],
            ['name' => 'Bentley', 'code' => 'BENTL'],
            ['name' => 'BMW', 'code' => 'BMW'],
            ['name' => 'Buick', 'code' => 'BUICK'],
            ['name' => 'Cadillac', 'code' => 'CAD'],
            ['name' => 'Chevrolet', 'code' => 'CHEV'],
            ['name' => 'Chrysler', 'code' => 'CHRY'],
            ['name' => 'Daewoo', 'code' => 'DAEW'],
            ['name' => 'Daihatsu', 'code' => 'DAIHAT'],
            ['name' => 'Datsun', 'code' => 'DATSUN'],
            ['name' => 'DeLorean', 'code' => 'DELOREAN'],
            ['name' => 'Dodge', 'code' => 'DODGE'],
            ['name' => 'Eagle', 'code' => 'EAGLE'],
            ['name' => 'Ferrari', 'code' => 'FER'],
            ['name' => 'FIAT', 'code' => 'FIAT'],
            ['name' => 'Fisker', 'code' => 'FISK'],
            ['name' => 'Ford', 'code' => 'FORD'],
            ['name' => 'Freightliner', 'code' => 'FREIGHT'],
            ['name' => 'Geo', 'code' => 'GEO'],
            ['name' => 'GMC', 'code' => 'GMC'],
            ['name' => 'Honda', 'code' => 'HONDA'],
            ['name' => 'HUMMER', 'code' => 'AMGEN'],
            ['name' => 'Hyundai', 'code' => 'HYUND'],
            ['name' => 'Infiniti', 'code' => 'INFIN'],
            ['name' => 'Isuzu', 'code' => 'ISU'],
            ['name' => 'Jaguar', 'code' => 'JAG'],
            ['name' => 'Jeep', 'code' => 'JEEP'],
            ['name' => 'Kia', 'code' => 'KIA'],
            ['name' => 'Lamborghini', 'code' => 'LAM'],
            ['name' => 'Lancia', 'code' => 'LAN'],
            ['name' => 'Land Rover', 'code' => 'ROV'],
            ['name' => 'Lexus', 'code' => 'LEXUS'],
            ['name' => 'Lincoln', 'code' => 'LINC'],
            ['name' => 'Lotus', 'code' => 'LOTUS'],
            ['name' => 'Maserati', 'code' => 'MAS'],
            ['name' => 'Maybach', 'code' => 'MAYBACH'],
            ['name' => 'Mazda', 'code' => 'MAZDA'],
            ['name' => 'McLaren', 'code' => 'MCLAREN'],
            ['name' => 'Mercedes-Benz', 'code' => 'MB'],
            ['name' => 'Mercury', 'code' => 'MERC'],
            ['name' => 'Merkur', 'code' => 'MERKUR'],
            ['name' => 'MINI', 'code' => 'MINI'],
            ['name' => 'Mitsubishi', 'code' => 'MIT'],
            ['name' => 'Nissan', 'code' => 'NISSAN'],
            ['name' => 'Oldsmobile', 'code' => 'OLDS'],
            ['name' => 'Peugeot', 'code' => 'PEUG'],
            ['name' => 'Plymouth', 'code' => 'PLYM'],
            ['name' => 'Pontiac', 'code' => 'PONT'],
            ['name' => 'Porsche', 'code' => 'POR'],
            ['name' => 'RAM', 'code' => 'RAM'],
            ['name' => 'Renault', 'code' => 'REN'],
            ['name' => 'Rolls-Royce', 'code' => 'RR'],
            ['name' => 'Saab', 'code' => 'SAAB'],
            ['name' => 'Saturn', 'code' => 'SATURN'],
            ['name' => 'Scion', 'code' => 'SCION'],
            ['name' => 'smart', 'code' => 'SMART'],
            ['name' => 'SRT', 'code' => 'SRT'],
            ['name' => 'Sterling', 'code' => 'STERL'],
            ['name' => 'Subaru', 'code' => 'SUB'],
            ['name' => 'Suzuki', 'code' => 'SUZUKI'],
            ['name' => 'Tesla', 'code' => 'TESLA'],
            ['name' => 'Toyota', 'code' => 'TOYOTA'],
            ['name' => 'Triumph', 'code' => 'TRI'],
            ['name' => 'Volkswagen', 'code' => 'VOLKS'],
            ['name' => 'Volvo', 'code' => 'VOLVO'],
            ['name' => 'Yugo', 'code' => 'YUGO'],
        ];
        VehicleMake::insert($makes);
    }
}
