<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
        $reportNames = ['تقرير الحضور الشهري', 'تقرير الماليات', 'تقرير الأداء التعليمي', 'تقرير الطلاب الجدد', 'تقرير الأنشطة'];

        $this->merge([
            'name' => $this->name ?? $reportNames[array_rand($reportNames)] . ' - ' . now()->format('Y-m'),
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('reports.fields.name'),

        ];
    }
}
