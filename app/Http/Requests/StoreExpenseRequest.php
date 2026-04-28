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

    protected function prepareForValidation()
    {
        $expenseTitles = ['مصاريف صيانة', 'شراء معدات تعليمية', 'فواتير كهرباء', 'مصاريف نظافة', 'شراء أثاث'];
        $vendors = ['شركة الصيانة السريعة', 'مكتبة جرير', 'الشركة السعودية للكهرباء', 'شركة النظافة المتحدة', 'IKEA'];
        $paymentMethods = ['cash', 'bank_transfer', 'credit_card', 'check'];
        $categories = ['maintenance', 'educational', 'utilities', 'cleaning', 'furniture'];

        $this->merge([
            'title' => $this->title ?? $expenseTitles[array_rand($expenseTitles)],
            'description' => $this->description ?? 'مصروفات تشغيلية للروضة',
            'amount' => $this->amount ?? rand(200, 5000),
            'expense_date' => $this->expense_date ?? now()->format('Y-m-d'),
            'vendor' => $this->vendor ?? $vendors[array_rand($vendors)],
            'receipt_number' => $this->receipt_number ?? 'REC-' . rand(1000, 9999),
            'payment_method' => $this->payment_method ?? $paymentMethods[array_rand($paymentMethods)],
            'reference_number' => $this->reference_number ?? 'REF-' . strtoupper(Str::random(6)),
            'status' => $this->status ?? 'pending',
            'created_by' => $this->created_by ?? auth()->id(),
            'assigned_to' => $this->assigned_to ?? null,
            'category' => $this->category ?? $categories[array_rand($categories)],
        ]);
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
