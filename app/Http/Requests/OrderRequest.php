<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'exists:products,id'],
            'product_quantity' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'string', Rule::in(['new', 'completed'])],
            'description' => ['nullable', 'string'],
        ];
    }
}
