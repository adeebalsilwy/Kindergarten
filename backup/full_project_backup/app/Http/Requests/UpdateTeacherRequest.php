<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:teachers,email|unique:teachers,email,'.$this->route('teacher').'',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|string',
            'salary' => 'nullable|numeric',
            'hire_date' => 'nullable|date',
            'photo_path' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'notes' => 'nullable|string',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('teachers.fields.name'),
            'email' => __('teachers.fields.email'),
            'phone' => __('teachers.fields.phone'),
            'address' => __('teachers.fields.address'),
            'date_of_birth' => __('teachers.fields.date_of_birth'),
            'gender' => __('teachers.fields.gender'),
            'qualification' => __('teachers.fields.qualification'),
            'experience' => __('teachers.fields.experience'),
            'salary' => __('teachers.fields.salary'),
            'hire_date' => __('teachers.fields.hire_date'),
            'photo_path' => __('teachers.fields.photo_path'),
            'is_active' => __('teachers.fields.is_active'),
            'notes' => __('teachers.fields.notes'),

        ];
    }
}
