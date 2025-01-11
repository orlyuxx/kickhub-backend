<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReordersRequest extends FormRequest
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
            'store_id' => 'nullable|exists:stores,store_id',
            'product_id' => 'nullable|exists:products,product_id',
            'vendor_id' => 'nullable|exists:vendors,vendor_id',
            'quantity' => 'required|integer|min:1',
            'reorder_date' => 'required|date',
            'status' => 'nullable|in:pending,approved,completed'
        ];
    }

    /**
     * Get the validation messages that should be returned for the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'store_id.exists' => 'The selected store does not exist.',
            'product_id.exists' => 'The selected product does not exist.',
            'vendor_id.exists' => 'The selected vendor does not exist.',
            'quantity.required' => 'The quantity field is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'The quantity must be at least 1.',
            'reorder_date.required' => 'The reorder date field is required.',
            'reorder_date.date' => 'The reorder date is not a valid date.',
            'status.in' => 'The status must be one of the following values: pending, approved, completed.'
        ];
    }
}
