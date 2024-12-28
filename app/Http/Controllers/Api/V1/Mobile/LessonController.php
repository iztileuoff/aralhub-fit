<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\LessonCollection;
use App\Http\Resources\V1\Mobile\LessonResource;
use App\Http\Resources\V1\Mobile\ShowLessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(Request $request)
    {
        $lessons = Lesson::when($request->input('module_id'), function ($query) use ($request) {
            $query->where('module_id', $request->input('module_id'));
        })->get();

        return new LessonCollection($lessons);
    }

    public function show(Lesson $lesson): ShowLessonResource
    {
        return new ShowLessonResource($lesson);
    }
}
