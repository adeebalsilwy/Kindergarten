<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email|unique:teachers,email',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'qualification' => 'required|string|max:255',
            'experience' => 'nullable|string',
            'salary' => 'required|numeric',
            'hire_date' => 'required|date',
            'photo_path' => 'required|string|max:255',
            'is_active' => 'required|boolean',
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
