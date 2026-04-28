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

        ];
    }

    protected function prepareForValidation()
    {
        $occupations = ['موظف حكومي', 'مهندس', 'طبيب', 'مدير شركة', 'تاجر', 'مدرس'];
        $workplaces = ['وزارة التربية', 'شركة أرامكو', 'المستشفى الجامعي', 'شركة الاتصالات', 'مؤسسة خاصة'];
        $addresses = ['الرياض - حي الروضة', 'جدة - حي الصفا', 'الدمام - حي الشاطئ', 'الخبر - حي العقيق'];

        $this->merge([
            'name' => $this->name ?? null,
            'email' => $this->email ?? null,
            'phone' => $this->phone ?? null,
            'secondary_phone' => $this->secondary_phone ?? null,
            'address' => $this->address ?? $addresses[array_rand($addresses)],
            'relationship' => $this->relationship ?? null,
            'occupation' => $this->occupation ?? $occupations[array_rand($occupations)],
            'workplace' => $this->workplace ?? $workplaces[array_rand($workplaces)],
            'national_id' => $this->national_id ?? null,
            'passport_number' => $this->passport_number ?? null,
            'date_of_birth' => $this->date_of_birth ?? null,
            'is_primary_emergency_contact' => $this->is_primary_emergency_contact ?? null,
            'is_primary_guardian' => $this->is_primary_guardian ?? null,
            'preferred_language' => $this->preferred_language ?? null,
            'receives_sms_notifications' => $this->receives_sms_notifications ?? null,
            'receives_email_notifications' => $this->receives_email_notifications ?? null,
            'is_active' => $this->is_active ?? null,
            'last_login_at' => $this->last_login_at ?? null,
            'notes' => $this->notes ?? 'ولي أمر مسؤول ومهتم',
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('guardians.fields.name'),

        ];
    }
}
