<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeeRequest extends FormRequest
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
