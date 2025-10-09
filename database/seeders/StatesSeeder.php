<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Andhra Pradesh',      'tamil_name' => 'ஆந்திரப் பிரதேசம்', 'status' => true],
            ['name' => 'Arunachal Pradesh',   'tamil_name' => 'அருணாசலப் பிரதேசம்', 'status' => true],
            ['name' => 'Assam',               'tamil_name' => 'அசாம்',             'status' => true],
            ['name' => 'Bihar',               'tamil_name' => 'பீகார்',            'status' => true],
            ['name' => 'Chhattisgarh',        'tamil_name' => 'சத்தீஸ்கர்',         'status' => true],
            ['name' => 'Goa',                 'tamil_name' => 'கோவா',              'status' => true],
            ['name' => 'Gujarat',             'tamil_name' => 'குஜராத்',           'status' => true],
            ['name' => 'Haryana',             'tamil_name' => 'ஹரியானா',           'status' => true],
            ['name' => 'Himachal Pradesh',    'tamil_name' => 'ஹிமாச்சலப் பிரதேசம்', 'status' => true],
            ['name' => 'Jharkhand',           'tamil_name' => 'ஜார்கண்ட்',          'status' => true],
            ['name' => 'Karnataka',           'tamil_name' => 'கர்நாடகா',          'status' => true],
            ['name' => 'Kerala',              'tamil_name' => 'கேரளா',             'status' => true],
            ['name' => 'Madhya Pradesh',      'tamil_name' => 'மத்தியப் பிரதேசம்',  'status' => true],
            ['name' => 'Maharashtra',         'tamil_name' => 'மகாராஷ்டிரா',       'status' => true],
            ['name' => 'Manipur',             'tamil_name' => 'மணிப்பூர்',          'status' => true],
            ['name' => 'Meghalaya',           'tamil_name' => 'மேகாலயா',           'status' => true],
            ['name' => 'Mizoram',             'tamil_name' => 'மிசோரம்',           'status' => true],
            ['name' => 'Nagaland',            'tamil_name' => 'நாகாலாந்து',        'status' => true],
            ['name' => 'Odisha',              'tamil_name' => 'ஒடிசா',             'status' => true],
            ['name' => 'Punjab',              'tamil_name' => 'பஞ்சாப்',           'status' => true],
            ['name' => 'Rajasthan',           'tamil_name' => 'ராஜஸ்தான்',         'status' => true],
            ['name' => 'Sikkim',              'tamil_name' => 'சிக்கிம்',           'status' => true],
            ['name' => 'Tamil Nadu',          'tamil_name' => 'தமிழ்நாடு',          'status' => true],
            ['name' => 'Telangana',           'tamil_name' => 'தெலுங்கானா',        'status' => true],
            ['name' => 'Tripura',             'tamil_name' => 'திரிபுரா',          'status' => true],
            ['name' => 'Uttar Pradesh',       'tamil_name' => 'உத்தரப் பிரதேசம்',  'status' => true],
            ['name' => 'Uttarakhand',         'tamil_name' => 'உத்தரகாண்ட்',       'status' => true],
            ['name' => 'West Bengal',         'tamil_name' => 'மேற்கு வங்காளம்',    'status' => true],
        ];
        State::truncate(); 
        State::insert($states);
    }
}
