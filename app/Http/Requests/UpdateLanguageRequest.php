<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:languages,code,'.$this->route('language').'',
            'is_rtl' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',

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
