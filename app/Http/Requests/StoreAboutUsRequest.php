<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;  // Set this to true to allow the request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],  // Name is required, max 255 chars
            'description' => ['nullable', 'string'],  // Description is optional
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],  // Thumbnail is required, must be an image
            'keypoints.*' => ['required', 'string', 'max:255'],  // Each keypoint must be a string, max 255 chars
        ];
    }
}
