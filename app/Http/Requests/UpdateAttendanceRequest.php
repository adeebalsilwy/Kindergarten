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
            'child_id' => 'nullable|exists:children,id',
            'date' => 'nullable|date',
            'status' => 'nullable|in:present,absent,sick,late,excused',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
            'notes' => 'nullable|string',
            'absence_reason' => 'nullable|string',
        ];
    }

    public function attributes()
    {
        return [
            'child_id' => __('attendances.fields.child_id'),
            'date' => __('attendances.fields.date'),
            'status' => __('attendances.fields.status'),
            'check_in' => __('attendances.fields.check_in'),
            'check_out' => __('attendances.fields.check_out'),
            'notes' => __('attendances.fields.notes'),
            'absence_reason' => __('attendances.fields.absence_reason'),
        ];
    }
}
