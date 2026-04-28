<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestItem1769276317Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $itemNames = ['عنصر فحص 1', 'عنصر تدقيق', 'بند تقييم', 'عنصر مراجعة', 'بند اختبار'];

        $this->merge([
            'name' => $this->name ?? $itemNames[array_rand($itemNames)] . ' #' . rand(100, 999),
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('test-item1769276317s.fields.name'),

        ];
    }
}
