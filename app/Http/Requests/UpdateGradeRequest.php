<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
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
            'comments' => 'nullable|string',
            'evaluator_id' => 'nullable|exists:teachers,id',
        ];
    }

    public function attributes()
    {
        return [
            'child_id' => __('grades.fields.child_id'),
            'subject' => __('grades.fields.subject'),
            'score' => __('grades.fields.score'),
            'date' => __('grades.fields.date'),
            'comments' => __('grades.fields.comments'),
            'evaluator_id' => __('grades.fields.evaluator_id'),
        ];
    }
}
