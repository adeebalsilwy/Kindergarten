<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string|max:255',
            'guard_name' => 'nullable|string|max:255',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'role_' . time(),
            'guard_name' => $this->guard_name ?? 'web',
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('roles.fields.name'),
            'guard_name' => __('roles.fields.guard_name'),

        ];
    }
}
