<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLessonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:2000'],
            'module_id' => ['required', Rule::exists('modules', 'id')],
            'youtube_url' => ['required', 'string', 'max:255', 'url'],
            'is_free' => ['required', 'boolean'],
            'checklists' => ['required', 'array'],
            'checklists.*.title' => ['required', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
