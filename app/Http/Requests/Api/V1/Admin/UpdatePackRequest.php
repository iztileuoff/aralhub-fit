<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePackRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255'],
            'price' => ['integer', 'min:1000'],
            'is_active' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
