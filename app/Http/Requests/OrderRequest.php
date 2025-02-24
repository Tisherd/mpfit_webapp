<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\Order;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('patch')) {
            return [
                'customer_name' => ['nullable', 'string', 'max:255'],
                'product_id' => ['nullable', 'exists:products,id'],
                'product_quantity' => ['nullable', 'integer', 'min:1'],
                'status' => ['nullable', 'string', Rule::in([Order::NEW, Order::COMPLETED])],
                'description' => ['nullable', 'string'],
            ];
        }

        return [
            'customer_name' => ['required', 'string', 'max:255'],
            'product_id' => ['required', 'exists:products,id'],
            'product_quantity' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'string', Rule::in([Order::NEW, Order::COMPLETED])],
            'description' => ['nullable', 'string'],
        ];
    }
}
