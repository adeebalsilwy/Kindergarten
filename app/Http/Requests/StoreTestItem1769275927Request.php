<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestItem1769275927Request extends FormRequest
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
        $itemNames = ['عنصر اختبار 1', 'عنصر تقييم', 'بند فحص', 'عنصر تحليل', 'بند مراقبة'];

        $this->merge([
            'name' => $this->name ?? $itemNames[array_rand($itemNames)] . ' #' . rand(100, 999),
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('test-item1769275927s.fields.name'),

        ];
    }
}
