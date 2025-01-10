<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        // Instantiate the Faker library
        $faker = Faker::create();

        // Create 20 fake chat messages
        foreach (range(1, 20) as $index) {
            DB::table('messages')->insert([
                'user_id' => 2,
                'admin_id' => null,
                'is_sender_user' => $index % 2 == 1,
                'text' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
