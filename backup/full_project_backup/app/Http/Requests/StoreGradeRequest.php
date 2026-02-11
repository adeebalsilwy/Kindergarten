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
            'child_id' => 'required',
            'subject' => 'required|string|max:255',
            'score' => 'required|string|max:255',
            'date' => 'required|date',

        ];
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
