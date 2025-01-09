<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImagesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'product_id' => 'nullable|exists:products,product_id', // Validate if product_id exists if provided
            'name' => 'required|string|max:255',
        ];

        // Check if the image is a single file or multiple files
        if ($this->hasFile('image') && is_array($this->file('image'))) {
            // Multiple images
            $rules['image'] = 'required|array';
            $rules['image.*'] = 'image|mimes:jpg,jpeg,png,gif|max:2048';
        } else {
            // Single image
            $rules['image'] = 'required|mimes:jpg,jpeg,png,gif|max:2048';
        }

        return $rules;
    }
}
