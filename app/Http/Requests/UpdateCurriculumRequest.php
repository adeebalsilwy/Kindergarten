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
            'code' => 'nullable|string|max:255|unique:curricula,code,'.$this->route('curriculum').'',
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
            'connected_materials' => 'array',
            'connected_materials.*' => 'exists:materials,id',

        ];
    }

    protected function prepareForValidation()
    {
        $gradeLevels = ['preschool', 'kindergarten', 'pre_k', 'toddlers'];
        $subjectAreas = ['language', 'math', 'science', 'art', 'physical_education'];

        $this->merge([
            'name' => $this->name ?? null,
            'code' => $this->code ?? null,
            'description' => $this->description ?? 'منهج تعليمي شامل وممتع للأطفال',
            'objectives' => $this->objectives ?? null,
            'learning_outcomes' => $this->learning_outcomes ?? null,
            'grade_level' => $this->grade_level ?? $gradeLevels[array_rand($gradeLevels)],
            'subject_area' => $this->subject_area ?? $subjectAreas[array_rand($subjectAreas)],
            'topics' => $this->topics ?? null,
            'materials_needed' => $this->materials_needed ?? null,
            'curriculum_type' => $this->curriculum_type ?? null,
            'duration_weeks' => $this->duration_weeks ?? null,
            'assessment_methods' => $this->assessment_methods ?? null,
            'is_active' => $this->is_active ?? null,
            'published_at' => $this->published_at ?? null,
            'created_by' => $this->created_by ?? null,
            'connected_materials' => $this->connected_materials ?? [],
            'status' => $this->status ?? null,
            'prerequisites' => $this->prerequisites ?? null,
            'syllabus' => $this->syllabus ?? null,
            'learning_objectives' => $this->learning_objectives ?? null,
        ]);
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
