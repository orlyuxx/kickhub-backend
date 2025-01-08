<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to true if you want to allow all users to make this request.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => 'nullable|exists:brands,brand_id',
            'sub_category_id' => 'nullable|exists:sub_categories,sub_category_id',
            'name' => 'required|string|max:255', 
            'color' => 'required|string|max:255', 
            'gender' => 'nullable|in:men,women,unisex', 
            'size' => 'required|string|max:50', 
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
            'name.required' => 'Product name is required.',
            'name.string' => 'Product name must be a valid string.',
            'name.max' => 'Product name cannot exceed 255 characters.',
            'color.required' => 'Color is required.',
            'color.string' => 'Color must be a valid string.',
            'color.max' => 'Color cannot exceed 255 characters.',
            'gender.in' => 'Gender must be either men, women, or unisex.',
            'size.required' => 'Size is required.',
            'size.string' => 'Size must be a valid string.',
            'size.max' => 'Size cannot exceed 50 characters.',
        ];
    }
}
