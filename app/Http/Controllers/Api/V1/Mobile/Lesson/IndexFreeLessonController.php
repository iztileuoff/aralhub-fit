<?php

namespace App\Http\Controllers\Api\V1\Mobile\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\LessonCollection;
use App\Models\Lesson;
use Illuminate\Http\Request;

use function Symfony\Component\Translation\t;

class IndexFreeLessonController extends Controller
{
    public function __invoke(Request $request): LessonCollection
    {
        $lessons = Lesson::where('is_free', true)
            ->select('id', 'title', 'module_id', 'youtube_url', 'is_free')
            ->orderBy('id', 'desc')
            ->cursorPaginate($request->input('per_page', 15));

        return new LessonCollection($lessons);
    }
}
