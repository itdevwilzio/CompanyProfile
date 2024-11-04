<?php

namespace App\Http\Requests;

use App\Models\HeroSection;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class StoreHeroSectionRequest extends FormRequest
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
            'heading' => ['required', 'string', 'max:255'],
            'subheading' => ['nullable', 'string', 'max:255'], 
            'achievement' => ['nullable', 'string',  'max:1000000'],           
            'banner' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'path_video' => ['nullable', 'string'],
        ];
    }

        public function store(StoreHeroSectionRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('banner')) {
            $bannerPath = $request->file('banner')->store('banners', 'public');
            $validated['banner'] = $bannerPath;
        }

        $validated['path_video'] = $request->input('path_video', null);

        // Sanitize the 'achievement' field to allow only specific HTML tags
        $validated['achievement'] = strip_tags($validated['achievement'], '<ol><li><br><strong>');

        // Log the sanitized achievement content for debugging (optional)
        Log::info('Sanitized Achievement:', ['achievement' => $validated['achievement']]);

        // Create new Hero Section
        HeroSection::create($validated);

        return redirect()->route('admin.hero_sections.index')->with('success', 'Hero Section created successfully.');
    }

    
}
