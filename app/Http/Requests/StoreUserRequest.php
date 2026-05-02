<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6|confirmed',
            'is_active' => 'nullable|boolean',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name ?? 'مستخدم ' . time(),
            'email' => $this->email ?? 'user' . time() . '@kindergarten.edu.sa',
            'password' => $this->password ?? bcrypt('password123'),
            'is_active' => $this->is_active ?? true,
            'phone' => $this->phone ?? '05' . rand(10000000, 99999999),
            'address' => $this->address ?? null,
        ]);
    }

    public function attributes()
    {
        return [
            'name' => __('users.fields.name'),
            'email' => __('users.fields.email'),
            'email_verified_at' => __('users.fields.email_verified_at'),
            'password' => __('users.fields.password'),
            'token' => __('users.fields.token'),
            'user_id' => __('users.fields.user_id'),
            'ip_address' => __('users.fields.ip_address'),
            'user_agent' => __('users.fields.user_agent'),
            'payload' => __('users.fields.payload'),
            'last_activity' => __('users.fields.last_activity'),

        ];
    }
}
