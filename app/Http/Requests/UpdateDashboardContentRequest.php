<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDashboardContentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'section' => 'nullable|string|max:255',
            'key' => 'nullable|string|max:255',
            'content' => 'nullable|json',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'metadata' => 'nullable|json',

        ];
    }

    public function attributes()
    {
        return [
            'section' => __('dashboard-contents.fields.section'),
            'key' => __('dashboard-contents.fields.key'),
            'content' => __('dashboard-contents.fields.content'),
            'is_active' => __('dashboard-contents.fields.is_active'),
            'order' => __('dashboard-contents.fields.order'),
            'metadata' => __('dashboard-contents.fields.metadata'),

        ];
    }
}
