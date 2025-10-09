<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class TamilNaduCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $stateId = 23; // Tamil Nadu's ID in your states table
        $cities = [
            ['name' => 'Chennai',         'tamil_name' => 'சென்னை',           'status' => true, 'state_id' => $stateId],
            ['name' => 'Coimbatore',      'tamil_name' => 'கோயம்புத்தூர்',     'status' => true, 'state_id' => $stateId],
            ['name' => 'Madurai',         'tamil_name' => 'மதுரை',             'status' => true, 'state_id' => $stateId],
            ['name' => 'Tiruchirappalli', 'tamil_name' => 'திருச்சிராப்பள்ளி', 'status' => true, 'state_id' => $stateId],
            ['name' => 'Salem',           'tamil_name' => 'சேலம்',             'status' => true, 'state_id' => $stateId],
            ['name' => 'Ambattur',        'tamil_name' => 'அம்பத்தூர்',         'status' => true, 'state_id' => $stateId],
            ['name' => 'Tirunelveli',     'tamil_name' => 'திருநெல்வேலி',      'status' => true, 'state_id' => $stateId],
            ['name' => 'Tiruppur',        'tamil_name' => 'திருப்பூர்',         'status' => true, 'state_id' => $stateId],
            ['name' => 'Avadi',           'tamil_name' => 'ஆவடி',              'status' => true, 'state_id' => $stateId],
            ['name' => 'Tiruvottiyur',    'tamil_name' => 'திருவொற்றியூர்',     'status' => true, 'state_id' => $stateId],
            ['name' => 'Thoothukkudi',    'tamil_name' => 'தூத்துக்குடி',       'status' => true, 'state_id' => $stateId],
            ['name' => 'Nagercoil',       'tamil_name' => 'நாகர்கோவில்',       'status' => true, 'state_id' => $stateId],
            ['name' => 'Thanjavur',       'tamil_name' => 'தஞ்சாவூர்',          'status' => true, 'state_id' => $stateId],
            ['name' => 'Pallavaram',      'tamil_name' => 'பல்லாவரம்',         'status' => true, 'state_id' => $stateId],
            ['name' => 'Dindigul',        'tamil_name' => 'திண்டுக்கல்',        'status' => true, 'state_id' => $stateId],
            ['name' => 'Vellore',         'tamil_name' => 'வேலூர்',            'status' => true, 'state_id' => $stateId],
            ['name' => 'Tambaram',        'tamil_name' => 'தாம்பரம்',           'status' => true, 'state_id' => $stateId],
            ['name' => 'Cuddalore',       'tamil_name' => 'கடலூர்',            'status' => true, 'state_id' => $stateId],
            ['name' => 'Kancheepuram',    'tamil_name' => 'காஞ்சிபுரம்',        'status' => true, 'state_id' => $stateId],
            ['name' => 'Alandur',         'tamil_name' => 'ஆலந்தூர்',           'status' => true, 'state_id' => $stateId],
            ['name' => 'Erode',           'tamil_name' => 'ஈரோடு',             'status' => true, 'state_id' => $stateId],
            ['name' => 'Tiruvannamalai',  'tamil_name' => 'திருவண்ணாமலை',     'status' => true, 'state_id' => $stateId],
            ['name' => 'Kumbakonam',      'tamil_name' => 'கும்பகோணம்',        'status' => true, 'state_id' => $stateId],
            ['name' => 'Rajapalayam',     'tamil_name' => 'ராஜபாளையம்',       'status' => true, 'state_id' => $stateId],
            ['name' => 'Kurichi',         'tamil_name' => 'குறிச்சி',          'status' => true, 'state_id' => $stateId],
            ['name' => 'Madavaram',       'tamil_name' => 'மாதவரம்',           'status' => true, 'state_id' => $stateId],
            ['name' => 'Pudukkottai',     'tamil_name' => 'புதுக்கோட்டை',      'status' => true, 'state_id' => $stateId],
            ['name' => 'Hosur',           'tamil_name' => 'ஓசூர்',              'status' => true, 'state_id' => $stateId],
            ['name' => 'Ambur',           'tamil_name' => 'அம்பூர்',            'status' => true, 'state_id' => $stateId],
            ['name' => 'Karaikkudi',      'tamil_name' => 'கரைக்குடி',         'status' => true, 'state_id' => $stateId],
            ['name' => 'Neyveli',         'tamil_name' => 'நெய்வேலி',          'status' => true, 'state_id' => $stateId],
            ['name' => 'Nagapattinam',    'tamil_name' => 'நாகப்பட்டினம்',     'status' => true, 'state_id' => $stateId],
        ];

        City::truncate(); 
        City::insert($cities);
    }
}
