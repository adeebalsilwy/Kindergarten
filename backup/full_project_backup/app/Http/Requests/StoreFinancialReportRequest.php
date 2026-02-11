<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFinancialReportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'name' => __('financial-reports.fields.name'),

        ];
    }
}
