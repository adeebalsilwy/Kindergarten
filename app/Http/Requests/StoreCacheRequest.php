<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCacheRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'required|string|max:255',
            'value' => 'required',
            'expiration' => 'required|integer',
            'owner' => 'required|string|max:255',

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
