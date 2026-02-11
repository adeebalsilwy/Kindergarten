<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestModelRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name' => __('test-models.fields.name'),

        ];
    }
}
