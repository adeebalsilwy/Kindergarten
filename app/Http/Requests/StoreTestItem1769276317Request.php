<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestItem1769276317Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('test-item1769276317s.fields.name'),

        ];
    }
}
