<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexLessonRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'module_id' => ['required', Rule::exists('modules', 'id')],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
