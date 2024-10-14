<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all sections or use pagination if needed
        $abouts = AboutUs::orderByDesc('id')->paginate(10);
    
        // Pass the data to the view as $abouts
        return view('admin.abouts.index', compact('abouts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUsRequest $request)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Handle thumbnail image upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Store the data
            AboutUs::create($validated);
        });

        return redirect()->route('admin.abouts.index')->with('success', 'Section added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $about)
    {
        // Pass the $aboutSection as $about to the view
        return view('admin.abouts.edit', ['about' => $about]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $about)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($request, $about) {
            $validated = $request->validated();

            // Handle thumbnail image upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Update the data
            $about->update($validated);
        });

        return redirect()->route('admin.abouts.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutSection)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($aboutSection) {
            $aboutSection->delete();
        });

        return redirect()->route('admin.abouts.index')->with('success', 'Section deleted successfully');
    }
}
