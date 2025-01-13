<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Admin\IndexLessonRequest;
use App\Http\Requests\Api\V1\Admin\StoreLessonRequest;
use App\Http\Requests\Api\V1\Admin\UpdateLessonRequest;
use App\Http\Resources\V1\Admin\LessonCollection;
use App\Http\Resources\V1\Admin\LessonResource;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index(IndexLessonRequest $request)
    {
        $lessons = Lesson::orderBy('id', 'asc')
            ->when($request->input('module_id'), function ($query) use ($request) {
                $query->where('module_id', $request->input('module_id'));
            })
            ->paginate($request->input('per_page', 10));

        return new LessonCollection($lessons);
    }

    public function store(StoreLessonRequest $request)
    {
        return new LessonResource(Lesson::create($request->validated()));
    }

    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        return new LessonResource(tap($lesson)->update($request->validated()));
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response()->json([
            "message" => "Success."
        ]);
    }
}
