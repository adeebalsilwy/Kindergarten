<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGuardianRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'relation' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'secondary_phone' => 'nullable|string|max:50',
            'occupation' => 'nullable|string|max:100',
            'workplace' => 'nullable|string|max:150',
            'is_primary_emergency_contact' => 'nullable|boolean',
            'bank_account_number' => 'nullable|string|max:100',
            'bank_name' => 'nullable|string|max:100',
            'preferred_language' => 'nullable|in:english,arabic',
            'receives_sms_notifications' => 'nullable|boolean',
            'receives_email_notifications' => 'nullable|boolean',
            'date_of_birth' => 'nullable|date',
            'national_id' => 'nullable|string|max:100',
            'passport_number' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
            'last_login_at' => 'nullable|date',
            'children_ids' => 'nullable|array',
            'children_ids.*' => 'integer|exists:children,id',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('guardians.fields.name'),
            'phone' => __('guardians.fields.phone'),
            'address' => __('guardians.fields.address'),
            'relation' => __('guardians.fields.relation'),
            'email' => __('guardians.fields.email'),
            'secondary_phone' => __('guardians.fields.secondary_phone'),
            'occupation' => __('guardians.fields.occupation'),
            'workplace' => __('guardians.fields.workplace'),
            'is_primary_emergency_contact' => __('guardians.fields.is_primary_emergency_contact'),
            'bank_account_number' => __('guardians.fields.bank_account_number'),
            'bank_name' => __('guardians.fields.bank_name'),
            'preferred_language' => __('guardians.fields.preferred_language'),
            'receives_sms_notifications' => __('guardians.fields.receives_sms_notifications'),
            'receives_email_notifications' => __('guardians.fields.receives_email_notifications'),
            'date_of_birth' => __('guardians.fields.date_of_birth'),
            'national_id' => __('guardians.fields.national_id'),
            'passport_number' => __('guardians.fields.passport_number'),
            'is_active' => __('guardians.fields.is_active'),
            'last_login_at' => __('guardians.fields.last_login_at'),
            'children_ids' => __('guardians.fields.children_ids'),
        ];
    }
}
