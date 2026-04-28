<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
        $permissions = ['view_children', 'edit_children', 'delete_children', 'view_teachers', 'edit_teachers', 'manage_finance', 'view_reports'];

        $this->merge([
            'InnoDB' => $this->InnoDB ?? null,
            'name' => $this->name ?? $permissions[array_rand($permissions)],
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
