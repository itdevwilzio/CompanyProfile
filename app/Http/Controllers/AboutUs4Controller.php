<?php

namespace App\Http\Controllers;

use App\Models\AboutUs4;
use App\Http\Requests\StoreAboutUs4Request;
use App\Http\Requests\UpdateAboutUs4Request;
use Illuminate\Support\Facades\DB;

class AboutUs4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all sections or use pagination if needed
        $abouts4 = AboutUs4::orderByDesc('id')->paginate(10);
    
        // Pass the data to the view as $abouts
        return view('admin.abouts4.index', compact('abouts4'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts4.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUs4Request $request)
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
            AboutUs4::create($validated);
        });

        return redirect()->route('admin.abouts4.index')->with('success', 'Section added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs4 $about4)
    {
        // Pass the $aboutSection as $about to the view
        return view('admin.abouts4.edit', ['about' => $about4]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUs4Request $request, AboutUs4 $about4)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($request, $about4) {
            $validated = $request->validated();

            // Handle thumbnail image upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Update the data
            $about4->update($validated);
        });

        return redirect()->route('admin.abouts4.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs4 $about4)
    {
        // Use transaction to ensure atomicity
        DB::transaction(function () use ($about4) {
            $about4->delete();
        });

        return redirect()->route('admin.abouts4.index')->with('success', 'Section deleted successfully');
    }
}
