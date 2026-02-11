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
            'debit' => 'required|numeric',
            'credit' => 'required|numeric',
            'entry_date' => 'required',
            'reference' => 'required|string|max:255',
            'account_type' => 'required|in:revenue,expense,asset,liability,equity,salary',

        ];
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
