<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $contents = File::get(storage_path('app/lessons.json'));
        $data = json_decode(json: $contents, associative: true);

        $lessons =  $data['lessons'];

        foreach ($lessons as $lesson) {
            Lesson::create($lesson);
        }
    }
}
