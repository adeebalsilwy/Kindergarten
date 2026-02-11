<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name' => __('roles.fields.name'),
            'guard_name' => __('roles.fields.guard_name'),

        ];
    }
}
