<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCurriculumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:curriculas,code,'.$this->route('curriculum').'',
            'description' => 'nullable|string',
            'objectives' => 'nullable|string',
            'learning_outcomes' => 'nullable|string',
            'grade_level' => 'nullable|string|max:255',
            'subject_area' => 'nullable|string|max:255',
            'topics' => 'nullable|json',
            'materials_needed' => 'nullable|json',
            'curriculum_type' => 'nullable|string|max:255',
            'duration_weeks' => 'nullable|integer',
            'assessment_methods' => 'nullable|json',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'created_by' => 'nullable',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('curricula.fields.name'),
            'code' => __('curricula.fields.code'),
            'description' => __('curricula.fields.description'),
            'objectives' => __('curricula.fields.objectives'),
            'learning_outcomes' => __('curricula.fields.learning_outcomes'),
            'grade_level' => __('curricula.fields.grade_level'),
            'subject_area' => __('curricula.fields.subject_area'),
            'topics' => __('curricula.fields.topics'),
            'materials_needed' => __('curricula.fields.materials_needed'),
            'curriculum_type' => __('curricula.fields.curriculum_type'),
            'duration_weeks' => __('curricula.fields.duration_weeks'),
            'assessment_methods' => __('curricula.fields.assessment_methods'),
            'is_active' => __('curricula.fields.is_active'),
            'published_at' => __('curricula.fields.published_at'),
            'created_by' => __('curricula.fields.created_by'),

        ];
    }
}
