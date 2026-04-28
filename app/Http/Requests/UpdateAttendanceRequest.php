<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttendanceRequest extends FormRequest
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
        $absenceReasons = ['مرض', 'عائلي', 'سفر', 'أخرى'];

        $this->merge([
            'child_id' => $this->child_id ?? null,
            'date' => $this->date ?? null,
            'status' => $this->status ?? null,
            'notes' => $this->notes ?? 'حضور منتظم',
            'check_in' => $this->check_in ?? null,
            'check_out' => $this->check_out ?? null,
            'absence_reason' => $this->absence_reason ?? $absenceReasons[array_rand($absenceReasons)],
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
