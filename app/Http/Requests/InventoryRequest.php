<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'store_id' => 'required|exists:stores,store_id',
            'product_id' => 'required|exists:products,product_id',
            'vendor_id' => 'nullable|exists:vendors,vendor_id',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'reorder_threshold' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'store_id.required' => 'The store field is required.',
            'store_id.exists' => 'The selected store does not exist.',
            'product_id.required' => 'The product field is required.',
            'product_id.exists' => 'The selected product does not exist.',
            'vendor_id.exists' => 'The selected vendor does not exist.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 0.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a numeric value.',
            'price.min' => 'The price must be at least 0.',
            'reorder_threshold.required' => 'The reorder threshold field is required.',
            'reorder_threshold.integer' => 'The reorder threshold must be an integer.',
            'reorder_threshold.min' => 'The reorder threshold must be at least 0.',
        ];
    }
}
