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
            'InnoDB' => 'required',
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',

        ];
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
