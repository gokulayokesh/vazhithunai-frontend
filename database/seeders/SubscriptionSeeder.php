<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Silver',
                'validity_days' => 90,
                'price' => 499.00,
                'profile_view_count' => 30,
            ],
            [
                'name' => 'Gold',
                'validity_days' => 180,
                'price' => 999.00,
                'profile_view_count' => 60,
            ],
            [
                'name' => 'Premium',
                'validity_days' => 365,
                'price' => 1499.00,
                'profile_view_count' => 100,
            ],
        ];

        Subscription::truncate(); 
        foreach ($plans as $plan) {
            Subscription::updateOrCreate(
                ['name' => $plan['name']],
                $plan
            );
        }
    }
}
