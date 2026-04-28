<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'description' => 'nullable|string',
            'is_active' => 'nullable|boolean',

        ];
    }

    protected function prepareForValidation()
    {
        $frequencies = ['monthly', 'quarterly', 'yearly', 'one_time'];
        $categories = ['tuition', 'registration', 'transportation', 'meals', 'activities'];

        $this->merge([
            'name' => $this->name ?? null,
            'amount' => $this->amount ?? null,
            'description' => $this->description ?? 'رسوم نظامية للروضة',
            'is_active' => $this->is_active ?? null,
            'frequency' => $this->frequency ?? $frequencies[array_rand($frequencies)],
            'category' => $this->category ?? $categories[array_rand($categories)],
            'due_date' => $this->due_date ?? null,
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('fees.fields.name'),
            'amount' => __('fees.fields.amount'),
            'description' => __('fees.fields.description'),
            'is_active' => __('fees.fields.is_active'),

        ];
    }
}
