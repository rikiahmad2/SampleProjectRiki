<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed websites data
        foreach (range(1, 5) as $index) {
            Website::create([
                'name' => $faker->company,
                'url' => $faker->url,
            ]);
        }
    }
}
