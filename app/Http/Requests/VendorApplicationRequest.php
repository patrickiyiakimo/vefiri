<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isCustomer();
    }

    public function rules(): array
    {
        return [
            'store_name' => 'required|string|max:255|unique:users,store_name',
            'store_description' => 'required|string|min:50',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'store_name.required' => 'Please provide your store name.',
            'store_name.unique' => 'This store name is already taken.',
            'store_description.required' => 'Please describe your store.',
            'store_description.min' => 'Store description must be at least 50 characters.',
            'phone.required' => 'Phone number is required.',
            'address.required' => 'Business address is required.',
        ];
    }
}