<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestModelRequest extends FormRequest
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
        $testNames = ['اختبار القدرات', 'اختبار الذكاء', 'اختبار التحصيلي', 'تقييم سلوكي', 'تقييم مهارات'];

        $this->merge([
            'name' => $this->name ?? $testNames[array_rand($testNames)] . ' - ' . now()->format('Y-m-d'),
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('test-models.fields.name'),

        ];
    }
}
