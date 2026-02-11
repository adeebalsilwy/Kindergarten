<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'instructions' => 'nullable|string',
            'class_id' => 'required',
            'teacher_id' => 'required',
            'curriculum_id' => 'required',
            'scheduled_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'activity_type' => 'required|string|max:255',
            'difficulty_level' => 'required|string|max:255',
            'required_materials' => 'required|json',
            'estimated_duration' => 'required|integer',
            'location' => 'required|string|max:255',
            'is_active' => 'required|boolean',
            'learning_objectives' => 'required|json',
            'outcomes' => 'required|json',
            'completed_at' => 'required|date',
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
