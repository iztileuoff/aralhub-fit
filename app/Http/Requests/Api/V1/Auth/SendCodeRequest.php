<?php

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SendCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'regex:/^998([0-9][012345789]|[0-9][125679]|7[01234569])[0-9]{7}$/'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
