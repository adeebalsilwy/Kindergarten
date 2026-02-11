<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClassesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:classes,code,'.$this->route('class').'',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable',
            'age_group' => 'nullable|in:toddlers,preschool,pre_k,kindergarten',
            'capacity' => 'nullable|integer',
            'current_students' => 'nullable|integer',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'room_number' => 'nullable|string|max:255',
            'monthly_fee' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('classes.fields.name'),
            'code' => __('classes.fields.code'),
            'description' => __('classes.fields.description'),
            'teacher_id' => __('classes.fields.teacher_id'),
            'age_group' => __('classes.fields.age_group'),
            'capacity' => __('classes.fields.capacity'),
            'current_students' => __('classes.fields.current_students'),
            'start_time' => __('classes.fields.start_time'),
            'end_time' => __('classes.fields.end_time'),
            'room_number' => __('classes.fields.room_number'),
            'monthly_fee' => __('classes.fields.monthly_fee'),
            'is_active' => __('classes.fields.is_active'),

        ];
    }
}
