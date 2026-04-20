<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'child_id' => 'nullable',
            'date' => 'nullable|date',
            'status' => 'nullable|in:present,absent,sick,late,excused',
            'notes' => 'nullable|string',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'date' => $this->date ?? now()->format('Y-m-d'),
            'status' => $this->status ?? 'present',
        ]);
    }

    public function attributes()
    {
        return [
            'child_id' => __('attendances.fields.child_id'),
            'date' => __('attendances.fields.date'),
            'status' => __('attendances.fields.status'),
            'notes' => __('attendances.fields.notes'),

        ];
    }
}
