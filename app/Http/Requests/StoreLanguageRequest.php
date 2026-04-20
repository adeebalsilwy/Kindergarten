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
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:languages,code',
            'is_rtl' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'Language ' . time(),
            'code' => $this->code ?? 'lang' . time(),
            'is_rtl' => $this->is_rtl ?? false,
            'is_active' => $this->is_active ?? true,
        ]);
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
