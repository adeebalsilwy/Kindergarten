<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'nullable|string',
            'relationship' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'secondary_phone' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'workplace' => 'nullable|string|max:255',
            'is_primary_emergency_contact' => 'boolean',
            'bank_account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'preferred_language' => 'nullable|in:english,arabic',
            'receives_sms_notifications' => 'boolean',
            'receives_email_notifications' => 'boolean',
            'date_of_birth' => 'nullable|date',
            'national_id' => 'nullable|string|max:255',
            'passport_number' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ];
    }

    protected function prepareForValidation()
    {
        $maleNames = ['خالد عبدالله', 'سعد محمد', 'فهد سالم', 'ناصر أحمد'];
        $femaleNames = ['نورة خالد', 'مريم سعد', 'هند محمد', 'ريم فهد'];
        $occupations = ['موظف حكومي', 'مهندس', 'طبيب', 'مدير شركة', 'تاجر'];
        $workplaces = ['وزارة التربية', 'شركة أرامكو', 'المستشفى الجامعي', 'شركة الاتصالات'];
        $addresses = ['الرياض - حي الروضة', 'جدة - حي الصفا', 'الدمام - حي الشاطئ'];
        $banks = ['البنك الأهلي', 'بنك الرياض', 'بنك البلاد', 'البنك السعودي الفرنسي'];

        $gender = rand(0, 1) ? 'male' : 'female';
        $names = $gender === 'male' ? $maleNames : $femaleNames;

        $this->merge([
            'name' => $this->name ?? $names[array_rand($names)],
            'phone' => $this->phone ?? '05' . rand(10000000, 99999999),
            'address' => $this->address ?? $addresses[array_rand($addresses)],
            'relationship' => $this->relationship ?? ($gender === 'male' ? 'father' : 'mother'),
            'email' => $this->email ?? 'parent' . time() . '@email.com',
            'secondary_phone' => $this->secondary_phone ?? '05' . rand(10000000, 99999999),
            'occupation' => $this->occupation ?? $occupations[array_rand($occupations)],
            'workplace' => $this->workplace ?? $workplaces[array_rand($workplaces)],
            'is_primary_emergency_contact' => $this->is_primary_emergency_contact ?? true,
            'bank_account_number' => $this->bank_account_number ?? 'SA' . rand(1000000000000, 9999999999999),
            'bank_name' => $this->bank_name ?? $banks[array_rand($banks)],
            'preferred_language' => $this->preferred_language ?? 'english',
            'receives_sms_notifications' => $this->receives_sms_notifications ?? true,
            'receives_email_notifications' => $this->receives_email_notifications ?? true,
            'date_of_birth' => $this->date_of_birth ?? now()->subYears(rand(28, 50))->format('Y-m-d'),
            'national_id' => $this->national_id ?? '1' . rand(100000000, 999999999),
            'passport_number' => $this->passport_number ?? null,
            'is_active' => $this->is_active ?? true,
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('parents.fields.name'),
            'phone' => __('parents.fields.phone'),
            'address' => __('parents.fields.address'),
            'relationship' => __('parents.fields.relationship'),
            'email' => __('parents.fields.email'),
            'secondary_phone' => __('parents.fields.secondary_phone'),
            'occupation' => __('parents.fields.occupation'),
            'workplace' => __('parents.fields.workplace'),
            'is_primary_emergency_contact' => __('parents.fields.is_primary_emergency_contact'),
            'bank_account_number' => __('parents.fields.bank_account_number'),
            'bank_name' => __('parents.fields.bank_name'),
            'preferred_language' => __('parents.fields.preferred_language'),
            'receives_sms_notifications' => __('parents.fields.receives_sms_notifications'),
            'receives_email_notifications' => __('parents.fields.receives_email_notifications'),
            'date_of_birth' => __('parents.fields.date_of_birth'),
            'national_id' => __('parents.fields.national_id'),
            'passport_number' => __('parents.fields.passport_number'),
            'is_active' => __('parents.fields.is_active'),
        ];
    }
}
