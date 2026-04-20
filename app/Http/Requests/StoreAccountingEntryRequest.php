<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountingEntryRequest extends FormRequest
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
        $this->merge([
            'debit' => $this->debit ?? 0,
            'credit' => $this->credit ?? 0,
            'entry_date' => $this->entry_date ?? now()->format('Y-m-d'),
            'reference' => $this->reference ?? 'REF' . time(),
            'account_type' => $this->account_type ?? 'general',
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
