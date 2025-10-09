<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\ReferenceData;

class ExportReferenceDataJson extends Command
{
    protected $signature = 'reference:export-json';
    protected $description = 'Export reference data to storage/app/public/json/data.json';

    public function handle()
    {
        $types = [
            'employmentTypes' => 'employmentTypes',
            'industries' => 'industries',
            'maritalStatuses' => 'maritalStatuses',
            'bodyTypes' => 'bodyTypes',
            'complexions' => 'complexions',
            'languagesKnown' => 'languagesKnown',
            'hobbies' => 'hobbies',
            'interests' => 'interests',
            'cuisines' => 'cuisines',
            'foodPreferences' => 'foodPreferences',
            'musicGenres' => 'musicGenres',
            'sportsFitness' => 'sportsFitness',
            'petPreferences' => 'petPreferences',
            'travelPreferences' => 'travelPreferences',
            'dietaryPreferences' => 'dietaryPreferences',
            'smokingHabits' => 'smokingHabits',
            'drinkingHabits' => 'drinkingHabits',
            'religions' => 'religions',
            'salaries' => 'salaries',
            'heights' => 'heights',
            'familyStatus' => 'familyStatus',
            'physicalStatus' => 'physicalStatus',
            'zodiacs' => 'zodiacs',
            'birthStars' => 'birthStars',
            'jobs' => 'jobs',
            'educations' => 'educations',
            'cities' => 'cities',
            'genders' => 'genders'
        ];

        $data = [];

        foreach ($types as $dbType => $jsonKey) {
            $data[$jsonKey] = ReferenceData::where('type', $dbType)
                ->select('id', 'value', 'tamil_name')
                ->orderBy('id')
                ->get()
                ->toArray();
        }

        Storage::disk('public')->makeDirectory('json');
        Storage::disk('public')->put('json/data.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));


        $this->info('Reference data exported successfully.');
    }
}
