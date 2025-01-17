<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreModuleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'pack_id' => ['required', Rule::exists('packs', 'id')],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
