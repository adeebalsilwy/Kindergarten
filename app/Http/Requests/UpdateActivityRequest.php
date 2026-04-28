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
            'required_materials' => 'nullable',
            'estimated_duration' => 'nullable|integer',
            'location' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'learning_objectives' => 'nullable',
            'outcomes' => 'nullable',
            'completed_at' => 'nullable|date',
            'notes' => 'nullable|string',

        ];
    }

    protected function prepareForValidation()
    {
        $locations = ['قاعة الأنشطة الرئيسية', 'الحديقة الخارجية', 'غرفة الفنون', 'المكتبة'];
        $activityTypes = ['educational', 'sports', 'art', 'music', 'social'];
        $difficultyLevels = ['easy', 'medium', 'hard'];

        $this->merge([
            'title' => $this->title ?? null,
            'description' => $this->description ?? 'نشاط تعليمي ممتع ومفيد للأطفال',
            'instructions' => $this->instructions ?? 'اتباع خطوات النشاط بعناية',
            'class_id' => $this->class_id ?? null,
            'teacher_id' => $this->teacher_id ?? null,
            'curriculum_id' => $this->curriculum_id ?? null,
            'scheduled_date' => $this->scheduled_date ?? null,
            'start_time' => $this->start_time ?? null,
            'end_time' => $this->end_time ?? null,
            'activity_type' => $this->activity_type ?? $activityTypes[array_rand($activityTypes)],
            'difficulty_level' => $this->difficulty_level ?? $difficultyLevels[array_rand($difficultyLevels)],
            'required_materials' => $this->required_materials ?? null,
            'estimated_duration' => $this->estimated_duration ?? null,
            'location' => $this->location ?? $locations[array_rand($locations)],
            'is_active' => $this->is_active ?? null,
            'learning_objectives' => $this->learning_objectives ?? null,
            'outcomes' => $this->outcomes ?? null,
            'completed_at' => $this->completed_at ?? null,
            'notes' => $this->notes ?? 'نشاط ممتع ومفيد',
            'status' => $this->status ?? null,
            'category' => $this->category ?? null,
            'materials_needed' => $this->materials_needed ?? null,
            'assessment_criteria' => $this->assessment_criteria ?? null,
            'max_participants' => $this->max_participants ?? null,
        ]);
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
