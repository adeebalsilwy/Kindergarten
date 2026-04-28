<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'child_id' => 'nullable',
            'fee_id' => 'nullable',
            'amount' => 'nullable|numeric',
            'payment_date' => 'nullable|date',
            'payment_method' => 'nullable|in:cash,bank_transfer,credit_card,check,online',
            'reference_number' => 'nullable|string|max:255',
            'status' => 'nullable|in:completed,pending,failed,refunded',
            'receipt_number' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $paymentMethods = ['cash', 'bank_transfer', 'credit_card', 'check', 'online'];

        $this->merge([
            'child_id' => $this->child_id ?? null,
            'fee_id' => $this->fee_id ?? null,
            'amount' => $this->amount ?? rand(500, 3000),
            'payment_date' => $this->payment_date ?? now()->format('Y-m-d'),
            'payment_method' => $this->payment_method ?? $paymentMethods[array_rand($paymentMethods)],
            'status' => $this->status ?? 'completed',
            'reference_number' => $this->reference_number ?? 'REF-' . strtoupper(Str::random(8)),
            'receipt_number' => $this->receipt_number ?? 'RCP-' . date('Y') . '-' . rand(1000, 9999),
        ]);
    }

    public function attributes()
    {
        return [
            'child_id' => __('payments.fields.child_id'),
            'fee_id' => __('payments.fields.fee_id'),
            'amount' => __('payments.fields.amount'),
            'payment_date' => __('payments.fields.payment_date'),
            'payment_method' => __('payments.fields.payment_method'),
            'reference_number' => __('payments.fields.reference_number'),
            'status' => __('payments.fields.status'),
            'receipt_number' => __('payments.fields.receipt_number'),

        ];
    }
}
