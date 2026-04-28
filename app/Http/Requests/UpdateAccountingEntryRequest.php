<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountingEntryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'nullable|string',
            'debit' => 'nullable|numeric',
            'credit' => 'nullable|numeric',
            'entry_date' => 'nullable',
            'reference' => 'nullable|string|max:255',
            'account_type' => 'nullable',

        ];
    }

    protected function prepareForValidation()
    {
        $descriptions = ['رسوم تسجيل طالب', 'دفع رواتب المعلمين', 'مصاريف صيانة', 'إيرادات الأنشطة', 'مصاريف تشغيلية'];
        $accountTypes = ['revenue', 'expense', 'asset', 'liability', 'equity'];

        $this->merge([
            'description' => $this->description ?? $descriptions[array_rand($descriptions)],
            'debit' => $this->debit ?? null,
            'credit' => $this->credit ?? null,
            'entry_date' => $this->entry_date ?? null,
            'reference' => $this->reference ?? 'REF-' . date('Y') . '-' . rand(1000, 9999),
            'account_type' => $this->account_type ?? $accountTypes[array_rand($accountTypes)],
            'created_by' => $this->created_by ?? null,
        ]);
    }

    public function attributes()
    {
        return [
            'description' => __('accounting-entries.fields.description'),
            'debit' => __('accounting-entries.fields.debit'),
            'credit' => __('accounting-entries.fields.credit'),
            'entry_date' => __('accounting-entries.fields.entry_date'),
            'reference' => __('accounting-entries.fields.reference'),
            'account_type' => __('accounting-entries.fields.account_type'),

        ];
    }
}
