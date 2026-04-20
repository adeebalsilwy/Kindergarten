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
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'relation' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'Parent',
            'phone' => $this->phone ?? '0000000000',
            'relation' => $this->relation ?? 'parent',
        ]);
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
