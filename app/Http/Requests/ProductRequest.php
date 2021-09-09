<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required', 'string',
            ],
            'description' => [
                'required', 'string',
            ],
            'price' => [
                'required', 'integer', 'gte:0',
            ],
            'image' => [
                'required', 'string',
            ],
            'position' => [
                'integer', 'gte:0',
            ],
            'quantity' => [
                'integer', 'gte:0',
            ],
            'category_id' => [
                'required', 'exists:App\Models\Category,id',
            ],
        ];
    }
}
