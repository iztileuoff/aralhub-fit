<?php

namespace App\Http\Requests\Api\V1\Mobile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => ['string', 'regex:/^998([0-9][012345789]|[0-9][125679]|7[01234569])[0-9]{7}$/', Rule::unique('users', 'phone')->ignore($this->user())],
            'name' => ['string', 'max:255'],
            'target_id' => ['integer', Rule::exists('targets', 'id')],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
