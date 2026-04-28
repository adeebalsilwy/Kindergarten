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
            'section' => 'nullable|string|max:255',
            'key' => 'nullable|string|max:255',
            'content' => 'nullable|json',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
            'metadata' => 'nullable|json',

        ];
    }

    protected function prepareForValidation()
    {
        $sections = ['welcome_section', 'stats_cards', 'recent_activities', 'announcements', 'calendar'];
        $keys = ['title', 'subtitle', 'description', 'header', 'footer'];

        $this->merge([
            'section' => $this->section ?? $sections[array_rand($sections)],
            'key' => $this->key ?? $keys[array_rand($keys)] . '_' . time(),
            'content' => $this->content ?? json_encode(['ar' => 'محتوى عربي', 'en' => 'English Content']),
            'is_active' => $this->is_active ?? true,
            'order' => $this->order ?? rand(1, 10),
            'metadata' => $this->metadata ?? json_encode(['type' => 'text', 'style' => 'default']),
        ]);
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
