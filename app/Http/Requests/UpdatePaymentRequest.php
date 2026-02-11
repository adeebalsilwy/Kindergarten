<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
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
