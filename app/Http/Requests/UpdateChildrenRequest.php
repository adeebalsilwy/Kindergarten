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
            'class_id' => 'nullable|integer|exists:classes,id',
            'parent_id' => 'nullable|integer|exists:guardians,id',
            'second_parent_id' => 'nullable|integer|exists:guardians,id',
            'photo_path' => 'nullable|string|max:255',
            'fees_required' => 'nullable|numeric',
            'fees_paid' => 'nullable|numeric',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:50',
            'emergency_contact_relation' => 'nullable|string|max:100',
            'medical_conditions' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medications' => 'nullable|string',
            'blood_type' => 'nullable|string|max:3',
            'enrollment_date' => 'nullable|date',
            'expected_graduation_date' => 'nullable|date',
            'enrollment_status' => 'nullable|in:active,inactive,graduated',
            'nationality' => 'nullable|string|max:100',
            'religion' => 'nullable|string|max:100',
            'special_needs' => 'nullable|string',
            'last_attended_at' => 'nullable|date',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('childrens.fields.name'),
            'dob' => __('childrens.fields.dob'),
            'gender' => __('childrens.fields.gender'),
            'class_id' => __('childrens.fields.class_id'),
            'parent_id' => __('childrens.fields.parent_id'),
            'second_parent_id' => __('childrens.fields.second_parent_id'),
            'photo_path' => __('childrens.fields.photo_path'),
            'fees_required' => __('childrens.fields.fees_required'),
            'fees_paid' => __('childrens.fields.fees_paid'),
            'emergency_contact_name' => __('childrens.fields.emergency_contact_name'),
            'emergency_contact_phone' => __('childrens.fields.emergency_contact_phone'),
            'emergency_contact_relation' => __('childrens.fields.emergency_contact_relation'),
            'medical_conditions' => __('childrens.fields.medical_conditions'),
            'allergies' => __('childrens.fields.allergies'),
            'medications' => __('childrens.fields.medications'),
            'blood_type' => __('childrens.fields.blood_type'),
            'enrollment_date' => __('childrens.fields.enrollment_date'),
            'expected_graduation_date' => __('childrens.fields.expected_graduation_date'),
            'enrollment_status' => __('childrens.fields.enrollment_status'),
            'nationality' => __('childrens.fields.nationality'),
            'religion' => __('childrens.fields.religion'),
            'special_needs' => __('childrens.fields.special_needs'),
            'last_attended_at' => __('childrens.fields.last_attended_at'),

        ];
    }
}
