<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUs4Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
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
            'name' => ['nullable', 'string', 'max:255'],  // Name is required, max 255 chars
            'description' => ['nullable', 'string'],  // Description is optional // Type is required, max 255 chars

            // Thumbnail is required and must be an image (png, jpg, jpeg)
            'thumbnail' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],

            // Keypoints validation
            'keypoints' => ['nullable', 'array'],  // Keypoints must be an array
            'keypoints.*' => ['nullable', 'string'],  // Each keypoint must be a string
        ];
    }
}
