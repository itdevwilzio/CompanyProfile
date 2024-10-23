<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($this->product->id), // Ignore uniqueness for the current product's name
            ],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('products')->ignore($this->product->id), // Ignore uniqueness for the current product's slug
            ],
            'tagline' => ['required', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'about' => ['required', 'string'],
        ];
    }
}