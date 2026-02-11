<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'expense_date' => 'nullable|date',
            'vendor' => 'nullable|string|max:255',
            'receipt_number' => 'nullable|string|max:255',
            'payment_method' => 'nullable|string|max:255',
            'reference_number' => 'nullable|string|max:255',
            'status' => 'nullable|in:pending,approved,paid,rejected',
            'created_by' => 'nullable',
            'assigned_to' => 'nullable',

        ];
    }

    public function attributes()
    {
        return [
            'title' => __('expenses.fields.title'),
            'description' => __('expenses.fields.description'),
            'amount' => __('expenses.fields.amount'),
            'expense_date' => __('expenses.fields.expense_date'),
            'vendor' => __('expenses.fields.vendor'),
            'receipt_number' => __('expenses.fields.receipt_number'),
            'payment_method' => __('expenses.fields.payment_method'),
            'reference_number' => __('expenses.fields.reference_number'),
            'status' => __('expenses.fields.status'),
            'created_by' => __('expenses.fields.created_by'),
            'assigned_to' => __('expenses.fields.assigned_to'),

        ];
    }
}
