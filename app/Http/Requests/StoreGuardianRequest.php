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
            'preferred_language' => 'nullable|in:english,arabic',
        ];
    }

    protected function prepareForValidation()
    {
        $maleNames = ['محمد عبدالله', 'أحمد خالد', 'سعد سالم', 'ناصر فهد', 'عبدالرحمن سعد'];
        $femaleNames = ['فاطمة سعد', 'مريم علي', 'نورة محمد', 'سارة أحمد', 'ليلى عبدالله'];
        $occupations = ['موظف حكومي', 'مهندس', 'طبيب', 'مدير شركة', 'تاجر', 'مدرس'];
        $workplaces = ['وزارة التربية', 'شركة أرامكو', 'المستشفى الجامعي', 'شركة الاتصالات', 'مؤسسة خاصة'];
        $addresses = ['الرياض - حي الروضة', 'جدة - حي الصفا', 'الدمام - حي الشاطئ', 'الخبر - حي العقيق'];

        $gender = rand(0, 1) ? 'male' : 'female';
        $names = $gender === 'male' ? $maleNames : $femaleNames;

        $this->merge([
            'name' => $this->name ?? $names[array_rand($names)],
            'email' => $this->email ?? 'parent' . time() . '@email.com',
            'phone' => $this->phone ?? '05' . rand(10000000, 99999999),
            'secondary_phone' => $this->secondary_phone ?? '05' . rand(10000000, 99999999),
            'address' => $this->address ?? $addresses[array_rand($addresses)],
            'relationship' => $this->relationship ?? ($gender === 'male' ? 'father' : 'mother'),
            'occupation' => $this->occupation ?? $occupations[array_rand($occupations)],
            'workplace' => $this->workplace ?? $workplaces[array_rand($workplaces)],
            'national_id' => $this->national_id ?? '1' . rand(100000000, 999999999),
            'passport_number' => $this->passport_number ?? null,
            'date_of_birth' => $this->date_of_birth ?? now()->subYears(rand(25, 50))->format('Y-m-d'),
            'is_primary_emergency_contact' => $this->is_primary_emergency_contact ?? true,
            'is_primary_guardian' => $this->is_primary_guardian ?? true,
            'preferred_language' => $this->preferred_language ?? 'english',
            'receives_sms_notifications' => $this->receives_sms_notifications ?? true,
            'receives_email_notifications' => $this->receives_email_notifications ?? true,
            'is_active' => $this->is_active ?? true,
            'last_login_at' => $this->last_login_at ?? null,
            'notes' => $this->notes ?? 'ولي أمر مسؤول ومهتم',
        ]);
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
