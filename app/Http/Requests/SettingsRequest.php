<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_email' => [
                'required', 'array',
            ],
            'order_email.0' => [
                'required', 'email:rfc,dns',
            ],
            'order_email.*' => [
                'email:rfc,dns', 'nullable',
            ],
            'phone' => [
                'required', 'min:11'
            ],
            'email' => [
                'required', 'email:rfc'
            ],
            'address' => [
                'required', 'string'
            ],
            'title' => [
                'required', 'string'
            ],
            'description' => [
                'required', 'string'
            ],
            'keywords' => [
                'required', 'string'
            ]
        ];
    }
}
