<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,customer_id',
            'product_id' => 'required|exists:products,product_id',
            'product_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'line_total' => 'required|numeric|min:0',
            'is_checked_out' => 'nullable|boolean',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'customer_id.required' => 'Customer ID is required.',
            'customer_id.exists' => 'The selected customer does not exist.',
            'product_id.required' => 'Product ID is required.',
            'product_id.exists' => 'The selected product does not exist.',
            'product_price.required' => 'Product price is required.',
            'product_price.numeric' => 'Product price must be a valid number.',
            'product_price.min' => 'Product price must be at least 0.',
            'quantity.required' => 'Quantity is required.',
            'quantity.integer' => 'Quantity must be a valid integer.',
            'quantity.min' => 'Quantity must be at least 1.',
            'line_total.required' => 'Line total is required.',
            'line_total.numeric' => 'Line total must be a valid number.',
            'line_total.min' => 'Line total must be at least 0.',
            'is_checked_out.boolean' => 'Checkout status must be a boolean value.',
        ];
    }
}
