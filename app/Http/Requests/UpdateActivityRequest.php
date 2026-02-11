<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'instructions' => 'nullable|string',
            'class_id' => 'nullable',
            'teacher_id' => 'nullable',
            'curriculum_id' => 'nullable',
            'scheduled_date' => 'nullable|date',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'activity_type' => 'nullable|string|max:255',
            'difficulty_level' => 'nullable|string|max:255',
            'required_materials' => 'nullable|json',
            'estimated_duration' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'learning_objectives' => 'nullable|json',
            'outcomes' => 'nullable|json',
            'completed_at' => 'nullable|date',
            'notes' => 'nullable|string',

        ];
    }

    public function attributes()
    {
        return [
            'title' => __('activities.fields.title'),
            'description' => __('activities.fields.description'),
            'instructions' => __('activities.fields.instructions'),
            'class_id' => __('activities.fields.class_id'),
            'teacher_id' => __('activities.fields.teacher_id'),
            'curriculum_id' => __('activities.fields.curriculum_id'),
            'scheduled_date' => __('activities.fields.scheduled_date'),
            'start_time' => __('activities.fields.start_time'),
            'end_time' => __('activities.fields.end_time'),
            'activity_type' => __('activities.fields.activity_type'),
            'difficulty_level' => __('activities.fields.difficulty_level'),
            'required_materials' => __('activities.fields.required_materials'),
            'estimated_duration' => __('activities.fields.estimated_duration'),
            'location' => __('activities.fields.location'),
            'is_active' => __('activities.fields.is_active'),
            'learning_objectives' => __('activities.fields.learning_objectives'),
            'outcomes' => __('activities.fields.outcomes'),
            'completed_at' => __('activities.fields.completed_at'),
            'notes' => __('activities.fields.notes'),

        ];
    }
}
