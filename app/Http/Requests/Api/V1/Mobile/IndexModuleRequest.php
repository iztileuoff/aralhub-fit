<?php

namespace App\Http\Requests\Api\V1\Mobile;

use App\Models\Pack;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexModuleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'order_id' => [
                'required',
                Rule::exists('orders', 'id')->where(function ($query) {
                    $query->where('user_id', auth()->user()->id);
                })
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
