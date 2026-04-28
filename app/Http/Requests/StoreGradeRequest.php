<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'child_id' => 'nullable|exists:children,id',
            'subject' => 'nullable|string|max:255',
            'score' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'comments' => 'nullable|string|max:1000',
            'evaluator_id' => 'nullable|exists:users,id',
        ];
    }

    protected function prepareForValidation()
    {
        $subjects = ['الرياضيات', 'اللغة العربية', 'اللغة الإنجليزية', 'العلوم', 'التربية الفنية', 'التربية البدنية'];
        $arabicScores = ['ممتاز', 'جيد جداً', 'جيد', 'مقبول', 'ضعيف'];

        $this->merge([
            'child_id' => $this->child_id ?? null,
            'subject' => $this->subject ?? $subjects[array_rand($subjects)],
            'score' => $this->score ?? rand(60, 100),
            'grade' => $this->grade ?? null,
            'date' => $this->date ?? now()->format('Y-m-d'),
            'comments' => $this->comments ?? 'أداء جيد ومتميز',
            'evaluator_id' => $this->evaluator_id ?? auth()->id(),
        ]);
    }

    public function attributes()
    {
        return [
            'child_id' => __('grades.fields.child_id'),
            'subject' => __('grades.fields.subject'),
            'score' => __('grades.fields.score'),
            'date' => __('grades.fields.date'),

        ];
    }
}
