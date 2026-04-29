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
            'preferred_language' => 'nullable|string|max:10',
        ];
    }

    protected function prepareForValidation()
    {
        // No automatic data injection - allow manual form input only
        $this->merge([
            'is_primary_guardian' => $this->is_primary_guardian ?? false,
            'is_primary_emergency_contact' => $this->is_primary_emergency_contact ?? false,
            'receives_sms_notifications' => $this->receives_sms_notifications ?? true,
            'receives_email_notifications' => $this->receives_email_notifications ?? true,
            'is_active' => $this->is_active ?? true,
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('guardians.fields.name'),

        ];
    }
}
