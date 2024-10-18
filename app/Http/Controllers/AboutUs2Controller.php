<?php

namespace App\Http\Controllers;

use App\Models\AboutUs2;
use App\Http\Requests\StoreAboutUs3Request;
use App\Http\Requests\UpdateAboutUs3Request;
use Illuminate\Support\Facades\DB;

class AboutUs2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all sections or use pagination if needed
        $abouts2 = AboutUs2::orderByDesc('id')->paginate(10);
    
        // Pass the data to the view as $abouts
        return view('admin.abouts2.index', compact('abouts2'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts2.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUs3Request $request)
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
            AboutUs2::create($validated);
        });

        return redirect()->route('admin.abouts2.index')->with('success', 'Section added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs2 $about2)
    {
        // Pass the $aboutSection as $about to the view
        return view('admin.abouts2.edit', ['about' => $about2]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUs3Request $request, AboutUs2 $about2)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($request, $about2) {
            $validated = $request->validated();

            // Handle thumbnail image upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Update the data
            $about2->update($validated);
        });

        return redirect()->route('admin.abouts2.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs2 $about2)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($about2) {
            $about2->delete();
        });

        return redirect()->route('admin.abouts2.index')->with('success', 'Section deleted successfully');
    }
}
