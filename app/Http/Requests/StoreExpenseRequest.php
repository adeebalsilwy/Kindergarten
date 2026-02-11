<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'expense_date' => 'required|date',
            'vendor' => 'required|string|max:255',
            'receipt_number' => 'required|string|max:255',
            'payment_method' => 'required|string|max:255',
            'reference_number' => 'required|string|max:255',
            'status' => 'required|in:pending,approved,paid,rejected',
            'created_by' => 'required',
            'assigned_to' => 'required',

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
