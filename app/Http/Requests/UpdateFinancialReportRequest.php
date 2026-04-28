<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinancialReportRequest extends FormRequest
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
        $reportTypes = ['تقرير الإيرادات', 'تقرير المصروفات', 'التقرير المالي الشهري', 'تقرير المصاريف التشغيلية', 'تقرير الأرباح والخسائر'];

        $this->merge([
            'name' => $this->name ?? $reportTypes[array_rand($reportTypes)] . ' - ' . now()->format('Y-m'),
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('financial-reports.fields.name'),

        ];
    }
}
