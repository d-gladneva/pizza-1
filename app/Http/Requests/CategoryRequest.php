<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string',
            ],
            'code' => [
                'required', 'string',
            ],
            'position' => [
                'integer', 'gte:0',
            ],
        ];
    }
}
