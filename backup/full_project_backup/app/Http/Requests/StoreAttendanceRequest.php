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
            'child_id' => 'required',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,sick,late,excused',
            'notes' => 'nullable|string',

        ];
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
