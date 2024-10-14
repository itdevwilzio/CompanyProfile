<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],  // Name is required, max 255 chars
            'description' => ['nullable', 'string'],  // Description is optional
            'type' => ['required', 'string', 'max:255'],  // Type is required, max 255 chars

            // Thumbnail is required and must be an image (png, jpg, jpeg)
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],

            // Keypoints validation
            'keypoints' => ['required', 'array'],  // Keypoints must be an array
            'keypoints.*' => ['required', 'string', 'max:255'],  // Each keypoint must be a string, max 255 chars
        ];
    }
}
