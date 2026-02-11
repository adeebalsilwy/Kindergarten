<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuardianRequest extends FormRequest
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
            'name' => __('guardians.fields.name'),

        ];
    }
}
