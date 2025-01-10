<?php

namespace App\Http\Requests\Api\V1\Mobile;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'text' => ['required', 'string', 'max:2000'],
            'admin_id' => ['nullable'],
            'user_id' => ['nullable'],
            'is_sender_user' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->user()->id,
            'is_sender_user' => true,
        ]);
    }
}
