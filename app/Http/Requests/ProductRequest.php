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
            'product_name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'product_price' => ['required', 'numeric', 'min:0'],
            'product_discount' => ['nullable', 'numeric', 'min:0'],
            'product_image' => ['nullable', 'image', 'max:2048'],
            'product_color' => ['nullable', 'string', 'max:255'],
            'product_description' => ['nullable', 'string'],
            'quantities' => ['required', 'array'],
            'quantities.*' => ['required', 'integer', 'min:0'],
        ];
    }
}

