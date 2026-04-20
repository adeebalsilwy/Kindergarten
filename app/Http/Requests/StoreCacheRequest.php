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
            'key' => 'nullable|string|max:255',
            'value' => 'nullable',
            'expiration' => 'nullable|integer',
            'owner' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'key' => $this->key ?? 'cache_' . time(),
            'value' => $this->value ?? '',
            'expiration' => $this->expiration ?? 3600,
            'owner' => $this->owner ?? 'system',
        ]);
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
