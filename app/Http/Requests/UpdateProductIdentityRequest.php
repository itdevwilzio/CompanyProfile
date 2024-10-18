<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductIdentityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorize only if the user has the necessary permissions
        // Customize this based on your authorization logic if needed
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'contentl1' => 'nullable|string',
            'contentl2' => 'nullable|string',
            'contentl3' => 'nullable|string',
        ];

        // If the request is for storing, require the logo; otherwise, make it optional for updates
        if ($this->isMethod('post')) {
            $rules['logo'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else {
            $rules['logo'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The product name is required.',
            'name.string' => 'The product name must be a valid string.',
            'name.max' => 'The product name may not be greater than 255 characters.',
            
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a valid string.',

            'logo.required' => 'Please upload a logo image.',
            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be a file of type: jpeg, png, jpg, gif.',
            'logo.max' => 'The logo size may not be greater than 2MB.',
        ];
    }
}
