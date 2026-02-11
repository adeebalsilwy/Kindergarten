<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDashboardContentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'section' => 'required|string|max:255',
            'key' => 'required|string|max:255',
            'content' => 'required|json',
            'is_active' => 'required|boolean',
            'order' => 'required|integer',
            'metadata' => 'required|json',

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
