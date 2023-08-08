<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $websiteIds = Website::pluck('id')->toArray();

        // Seed subscribers data
        foreach (range(1, 10) as $index) {
            Subscriber::create([
                'email' => $faker->email,
                'website_id' => $faker->randomElement($websiteIds),
            ]);
        }
    }
}
