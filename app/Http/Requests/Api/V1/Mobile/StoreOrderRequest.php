<?php

namespace App\Http\Requests\Api\V1\Mobile;

use App\Models\Pack;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['nullable'],
            'pack_id' => [
                'required',
                Rule::exists('packs', 'id'), // TODO: add where is_active true
                Rule::unique('orders', 'pack_id')->where(function ($query) {
                    $query->where('status', '!=', 'finished')->where('user_id', $this->user()->id);
                })
            ],
            'amount' => ['nullable'],
            'status' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $pack = Pack::findOrFail($this->input('pack_id'));

        $this->merge([
            'user_id' => $this->user()->id,
            'amount' => $pack->price * 100,
            'status' => 'new',
        ]);
    }
}
