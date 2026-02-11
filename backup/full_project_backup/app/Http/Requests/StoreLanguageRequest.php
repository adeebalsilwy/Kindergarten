<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:languages,code',
            'is_rtl' => 'required|boolean',
            'is_active' => 'required|boolean',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('languages.fields.name'),
            'code' => __('languages.fields.code'),
            'is_rtl' => __('languages.fields.is_rtl'),
            'is_active' => __('languages.fields.is_active'),

        ];
    }
}
