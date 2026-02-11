<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:classes,code',
            'description' => 'nullable|string',
            'teacher_id' => 'required|integer|exists:teachers,id',
            'grade_id' => 'required|integer|exists:grades,id',
            'age_group' => 'required|in:toddlers,preschool,pre_k,kindergarten',
            'capacity' => 'required|integer',
            'current_students' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_number' => 'required|string|max:255',
            'monthly_fee' => 'required|numeric',
            'is_active' => 'required|boolean',
            'schedule' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('classes.fields.name'),
            'code' => __('classes.fields.code'),
            'description' => __('classes.fields.description'),
            'teacher_id' => __('classes.fields.teacher_id'),
            'grade_id' => __('classes.fields.grade_id'),
            'age_group' => __('classes.fields.age_group'),
            'capacity' => __('classes.fields.capacity'),
            'current_students' => __('classes.fields.current_students'),
            'start_time' => __('classes.fields.start_time'),
            'end_time' => __('classes.fields.end_time'),
            'room_number' => __('classes.fields.room_number'),
            'monthly_fee' => __('classes.fields.monthly_fee'),
            'is_active' => __('classes.fields.is_active'),
            'schedule' => __('classes.fields.schedule'),
            'location' => __('classes.fields.location'),
            'start_date' => __('classes.fields.start_date'),
            'end_date' => __('classes.fields.end_date'),

        ];
    }
}
