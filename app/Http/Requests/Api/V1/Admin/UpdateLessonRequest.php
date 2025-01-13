<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLessonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'description' => ['string', 'max:2000'],
            'module_id' => [Rule::exists('modules', 'id')],
            'youtube_url' => ['string', 'max:255', 'url'],
            'is_free' => ['boolean'],
            'checklists' => ['array'],
            'checklists.*.title' => ['string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
