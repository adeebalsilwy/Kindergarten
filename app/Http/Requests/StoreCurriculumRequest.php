<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurriculumRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:curricula,code',
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
        $curriculumNames = ['منهج اللغة العربية', 'منهج الرياضيات', 'منهج العلوم', 'منهج التربية الفنية', 'منهج اللغة الإنجليزية'];
        $gradeLevels = ['preschool', 'kindergarten', 'pre_k', 'toddlers'];
        $subjectAreas = ['language', 'math', 'science', 'art', 'physical_education'];

        $this->merge([
            'name' => $this->name ?: $curriculumNames[array_rand($curriculumNames)],
            'code' => $this->code ?: 'CUR-' . strtoupper(Str::random(6)),
            'grade_level' => $this->grade_level ?: $gradeLevels[array_rand($gradeLevels)],
            'subject_area' => $this->subject_area ?: $subjectAreas[array_rand($subjectAreas)],
            'duration_weeks' => $this->duration_weeks ?? rand(8, 16),
            'is_active' => $this->is_active ?? true,
            'published_at' => $this->published_at ?: now()->format('Y-m-d H:i:s'),
            'status' => $this->status ?: 'active',
            'curriculum_type' => $this->curriculum_type ?: 'standard',
            'description' => $this->description ?: 'منهج تعليمي شامل وممتع للأطفال',
            'objectives' => $this->objectives ?: json_encode(['تنمية المهارات الأساسية', 'تعزيز التفكير الإبداعي']),
            'learning_outcomes' => $this->learning_outcomes ?: json_encode(['إتقان المفاهيم الأساسية', 'المشاركة الفعالة']),
            'topics' => $this->topics ?: json_encode(['المقدمة', 'المفاهيم الأساسية', 'التطبيق العملي']),
            'materials_needed' => $this->materials_needed ?: json_encode(['كتب', 'أوراق عمل', 'أدوات فنية']),
            'assessment_methods' => $this->assessment_methods ?: json_encode(['اختبارات شفهية', 'مشاريع', 'واجبات']),
            'prerequisites' => $this->prerequisites ?: null,
            'syllabus' => $this->syllabus ?: null,
            'learning_objectives' => $this->learning_objectives ?: json_encode(['الفهم والاستيعاب', 'التطبيق العملي']),
            'created_by' => auth()->id(),
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
