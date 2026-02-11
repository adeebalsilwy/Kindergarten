<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCacheRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'nullable|string|max:255',
            'value' => 'nullable',
            'expiration' => 'nullable|integer',
            'owner' => 'nullable|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'key' => __('caches.fields.key'),
            'value' => __('caches.fields.value'),
            'expiration' => __('caches.fields.expiration'),
            'owner' => __('caches.fields.owner'),

        ];
    }
}
