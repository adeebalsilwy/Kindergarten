<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommandLogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'command' => 'required|string|max:255',
            'parameters' => 'required|json',
            'output' => 'nullable|string',
            'status' => 'required|string|max:255',
            'error_message' => 'nullable|string',

        ];
    }

    public function attributes()
    {
        return [
            'command' => __('command-logs.fields.command'),
            'parameters' => __('command-logs.fields.parameters'),
            'output' => __('command-logs.fields.output'),
            'status' => __('command-logs.fields.status'),
            'error_message' => __('command-logs.fields.error_message'),

        ];
    }
}
