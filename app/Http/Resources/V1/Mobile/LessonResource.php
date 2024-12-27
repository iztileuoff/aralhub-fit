<?php

namespace App\Http\Resources\V1\Mobile;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Lesson */
class LessonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'module_id' => $this->module_id,
            'youtube_url' => $this->youtube_url,
            'is_free' => $this->is_free,
            'checklists' => $this->checklists,
        ];
    }
}
