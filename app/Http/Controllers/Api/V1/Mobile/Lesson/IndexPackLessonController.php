<?php

namespace App\Http\Controllers\Api\V1\Mobile\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Mobile\LessonCollection;
use App\Models\Lesson;
use App\Models\Pack;
use Illuminate\Http\Request;

use function Symfony\Component\Translation\t;

class IndexPackLessonController extends Controller
{
    public function __invoke(Request $request, Pack $pack): LessonCollection
    {
        $moduleIds = $pack->modules()->pluck('id');

        $lessons = Lesson::where('is_free', true)
            ->whereIn('module_id', $moduleIds)
            ->select('id', 'title', 'module_id', 'youtube_url', 'is_free')
            ->orderBy('id', 'asc')
            ->cursorPaginate($request->input('per_page', 15));

        return new LessonCollection($lessons);
    }
}
