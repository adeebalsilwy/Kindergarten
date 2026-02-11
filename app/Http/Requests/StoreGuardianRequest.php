<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuardianRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'secondary_phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'relationship' => 'nullable|string|max:50',
            'occupation' => 'nullable|string|max:100',
            'workplace' => 'nullable|string|max:150',
            'national_id' => 'nullable|string|max:100',
            'passport_number' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'is_primary_emergency_contact' => 'nullable|boolean',
            'is_primary_guardian' => 'nullable|boolean',
            'preferred_language' => 'nullable|in:english,arabic',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('guardians.fields.name'),
            'email' => __('guardians.fields.email'),
            'phone' => __('guardians.fields.phone'),
            'secondary_phone' => __('guardians.fields.secondary_phone'),
            'address' => __('guardians.fields.address'),
            'relationship' => __('guardians.fields.relationship'),
            'occupation' => __('guardians.fields.occupation'),
            'workplace' => __('guardians.fields.workplace'),
            'national_id' => __('guardians.fields.national_id'),
            'passport_number' => __('guardians.fields.passport_number'),
            'date_of_birth' => __('guardians.fields.date_of_birth'),
        ];
    }
}
