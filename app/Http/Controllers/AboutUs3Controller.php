<?php

namespace App\Http\Controllers;

use App\Models\AboutUs3;
use App\Http\Requests\StoreAboutUs3Request;
use App\Http\Requests\UpdateAboutUs3Request;
use Illuminate\Support\Facades\DB;

class AboutUs3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all sections or use pagination if needed
        $abouts3 = AboutUs3::orderByDesc('id')->paginate(10);
    
        // Pass the data to the view as $abouts
        return view('admin.abouts3.index', compact('abouts3'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts3.create');
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
            AboutUs3::create($validated);
        });

        return redirect()->route('admin.abouts3.index')->with('success', 'Section added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs3 $about3)
    {
        // Pass the $aboutSection as $about to the view
        return view('admin.abouts3.edit', ['about' => $about3]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUs3Request $request, AboutUs3 $about3)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($request, $about3) {
            $validated = $request->validated();

            // Handle thumbnail image upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Update the data
            $about3->update($validated);
        });

        return redirect()->route('admin.abouts3.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs3 $about3)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($about3) {
            $about3->delete();
        });

        return redirect()->route('admin.abouts3.index')->with('success', 'Section deleted successfully');
    }
}
