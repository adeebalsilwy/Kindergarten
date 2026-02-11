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
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',

        ];
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
