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
            'email' => 'required|email|unique:users,email|unique:users,email',
            'email_verified_at' => 'required|date',
            'password' => 'required|string|min:6',
            'token' => 'required|string|max:255',
            'user_id' => 'required',
            'ip_address' => 'required|string|max:255',
            'user_agent' => 'nullable|string',
            'payload' => 'nullable|string',
            'last_activity' => 'required|integer',

        ];
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
