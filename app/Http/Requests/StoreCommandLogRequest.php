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
            'command' => 'nullable|string|max:255',
            'parameters' => 'nullable|json',
            'output' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'error_message' => 'nullable|string',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'command' => $this->command ?? 'unknown',
            'parameters' => $this->parameters ?? json_encode([]),
            'status' => $this->status ?? 'pending',
        ]);
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
