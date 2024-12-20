<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            //
            'name' => ['required', 'string', 'max:255'],
            'tagline1' => ['required', 'string', 'max:255'],
            'tagline2' => ['required', 'string', 'max:255'],
            'tagline3' => ['required', 'string', 'max:255'],
            'tagline4' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'about' => ['required', 'string', 'max:65535'],
        ];
    }
}
