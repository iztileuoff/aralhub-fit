<?php

namespace App\Http\Requests\Api\V1\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'password' => ['string', 'min:6'],
            'phone' => ['string', 'regex:/^998([0-9][012345789]|[0-9][125679]|7[01234569])[0-9]{7}$/', Rule::unique('admins', 'phone')->ignore($this->admin)],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
