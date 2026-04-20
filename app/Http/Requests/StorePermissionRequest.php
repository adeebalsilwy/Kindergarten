<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'InnoDB' => 'nullable',
            'name' => 'nullable|string|max:255',
            'guard_name' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'permission_' . time(),
            'guard_name' => $this->guard_name ?? 'web',
        ]);
    }

    public function attributes()
    {
        return [
            'InnoDB' => __('permissions.fields.InnoDB'),
            'name' => __('permissions.fields.name'),
            'guard_name' => __('permissions.fields.guard_name'),

        ];
    }
}
