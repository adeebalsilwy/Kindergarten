<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'Fee ' . time(),
            'amount' => $this->amount ?? 0,
            'is_active' => $this->is_active ?? true,
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('fees.fields.name'),
            'amount' => __('fees.fields.amount'),
            'description' => __('fees.fields.description'),
            'is_active' => __('fees.fields.is_active'),

        ];
    }
}
