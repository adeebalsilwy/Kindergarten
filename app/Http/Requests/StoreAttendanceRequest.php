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
        $statuses = ['present', 'absent', 'sick', 'late', 'excused'];
        $absenceReasons = ['مرض', 'عائلي', 'سفر', 'أخرى'];

        $status = $this->status ?? 'present';

        $this->merge([
            'child_id' => $this->child_id ?? null,
            'date' => $this->date ?? now()->format('Y-m-d'),
            'status' => $status,
            'notes' => $this->notes ?? 'حضور منتظم',
            'check_in' => $this->check_in ?? ($status === 'present' ? now()->format('H:i:s') : null),
            'check_out' => $this->check_out ?? ($status === 'present' ? now()->addHours(6)->format('H:i:s') : null),
            'absence_reason' => $this->absence_reason ?? ($status !== 'present' ? $absenceReasons[array_rand($absenceReasons)] : null),
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
