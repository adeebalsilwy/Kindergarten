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
        $classNames = ['فراشات', 'نجوم', 'أقمار', 'زهور', 'أشبال', 'عصافير', 'فراشات الصغار', 'نجوم المستقبل'];
        $ageGroups = ['toddlers', 'preschool', 'pre_k', 'kindergarten'];
        $rooms = ['101', '102', '103', '104', '201', '202', 'A1', 'A2', 'B1', 'B2'];

        $this->merge([
            'name' => $this->name ?? 'فصل ' . $classNames[array_rand($classNames)],
            'code' => $this->code ?? 'CLS-' . strtoupper(Str::random(4)),
            'description' => $this->description ?? 'فصل دراسي مجهز بأحدث الوسائل التعليمية للأطفال',
            'capacity' => $this->capacity ?? rand(15, 25),
            'current_students' => $this->current_students ?? 0,
            'monthly_fee' => $this->monthly_fee ?? rand(800, 2000),
            'is_active' => $this->is_active ?? true,
            'start_time' => $this->start_time ?? '07:30',
            'end_time' => $this->end_time ?? '13:30',
            'room_number' => $this->room_number ?? $rooms[array_rand($rooms)],
            'age_group' => $this->age_group ?? $ageGroups[array_rand($ageGroups)],
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
