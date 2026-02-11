<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestModelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',

        ];
    }

    public function attributes()
    {
        return [
            // Define attribute names for validation messages
        ];
    }
}
