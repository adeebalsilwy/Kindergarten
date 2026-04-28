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

    protected function prepareForValidation()
    {
        $cacheKeys = ['app_settings', 'user_session', 'dashboard_data', 'language_cache', 'config_cache'];

        $this->merge([
            'key' => $this->key ?? $cacheKeys[array_rand($cacheKeys)] . '_' . time(),
            'value' => $this->value ?? json_encode(['cached_at' => now(), 'data' => []]),
            'expiration' => $this->expiration ?? rand(1800, 7200),
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
