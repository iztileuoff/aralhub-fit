<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexModuleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pack_id' => ['required', Rule::exists('packs', 'id')],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
