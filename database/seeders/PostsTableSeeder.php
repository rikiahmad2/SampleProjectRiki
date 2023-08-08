<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Get all website IDs
        $websiteIds = DB::table('websites')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('posts')->insert([
                'website_id' => $faker->randomElement($websiteIds),
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
