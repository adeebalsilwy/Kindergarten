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
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255|unique:classes,code',
            'description' => 'nullable|string',
            'teacher_id' => 'nullable|integer|exists:teachers,id',
            'grade_id' => 'nullable|integer|exists:grades,id',
            'age_group' => 'nullable|in:toddlers,preschool,pre_k,kindergarten',
            'capacity' => 'nullable|integer',
            'current_students' => 'nullable|integer',
            'start_time' => 'nullable',
            'end_time' => 'nullable',
            'room_number' => 'nullable|string|max:255',
            'monthly_fee' => 'nullable|numeric',
            'is_active' => 'nullable|boolean',
            'schedule' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'Class ' . time(),
            'code' => $this->code ?? 'CLS' . time(),
            'capacity' => $this->capacity ?? 20,
            'current_students' => $this->current_students ?? 0,
            'monthly_fee' => $this->monthly_fee ?? 0,
            'is_active' => $this->is_active ?? true,
            'start_time' => $this->start_time ?? '08:00',
            'end_time' => $this->end_time ?? '14:00',
            'room_number' => $this->room_number ?? '101',
        ]);
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
