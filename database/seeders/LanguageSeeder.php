<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'code' => 'en',
                'name' => [
                    'en' => 'English',
                    'lt' => 'Lithuanian'
                ]
            ],
            [
                'code' => 'lt',
                'name' => [
                    'en' => 'Anglškai',
                    'lt' => 'Lietuviškai'
                ]
            ]
        ];
        foreach ($languages as $language) {
            Language::firstOrCreate(['code' => $language['code']], $language);
        }
    }
}
