<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        // Instantiate the Faker library
        $faker = Faker::create();

        // Create 20 fake chat messages
        foreach (range(1, 20) as $index) {
            DB::table('notifications')->insert([
                'title' => $faker->title,
                'description' => $faker->text,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
