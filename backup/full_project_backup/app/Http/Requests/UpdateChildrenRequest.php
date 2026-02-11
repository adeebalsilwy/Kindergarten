<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChildrenRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'class_grade' => 'nullable|string|max:255',
            'parent_id' => 'nullable',
            'photo_path' => 'nullable|string|max:255',
            'fees_required' => 'nullable|numeric',
            'fees_paid' => 'nullable|numeric',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('childrens.fields.name'),
            'dob' => __('childrens.fields.dob'),
            'gender' => __('childrens.fields.gender'),
            'class_grade' => __('childrens.fields.class_grade'),
            'parent_id' => __('childrens.fields.parent_id'),
            'photo_path' => __('childrens.fields.photo_path'),
            'fees_required' => __('childrens.fields.fees_required'),
            'fees_paid' => __('childrens.fields.fees_paid'),

        ];
    }
}
