<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductIdentityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Change this if you have authorization logic
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image validation
            'details' => 'nullable|string',
        ];
    }
}
