<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestItem1769275927Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'Item ' . time(),
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('test-item1769275927s.fields.name'),

        ];
    }
}
