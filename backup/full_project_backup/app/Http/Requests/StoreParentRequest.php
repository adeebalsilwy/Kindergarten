<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string',
            'relation' => 'required|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('parents.fields.name'),
            'phone' => __('parents.fields.phone'),
            'address' => __('parents.fields.address'),
            'relation' => __('parents.fields.relation'),

        ];
    }
}
