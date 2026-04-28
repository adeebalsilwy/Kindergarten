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
        $rooms = ['101', '102', '103', '104', '201', '202', 'A1', 'A2', 'B1', 'B2'];

        $this->merge([
            'name' => $this->name ?? null,
            'code' => $this->code ?? null,
            'description' => $this->description ?? 'فصل دراسي مجهز بأحدث الوسائل التعليمية للأطفال',
            'teacher_id' => $this->teacher_id ?? null,
            'grade_level_id' => $this->grade_level_id ?? null,
            'age_group' => $this->age_group ?? null,
            'capacity' => $this->capacity ?? null,
            'current_students' => $this->current_students ?? null,
            'start_time' => $this->start_time ?? null,
            'end_time' => $this->end_time ?? null,
            'room_number' => $this->room_number ?? $rooms[array_rand($rooms)],
            'monthly_fee' => $this->monthly_fee ?? null,
            'is_active' => $this->is_active ?? null,
            'schedule' => $this->schedule ?? null,
            'location' => $this->location ?? null,
            'start_date' => $this->start_date ?? null,
            'end_date' => $this->end_date ?? null,
            'curriculum' => $this->curriculum ?? null,
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
