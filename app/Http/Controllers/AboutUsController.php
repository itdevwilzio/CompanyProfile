<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;

use App\Http\Requests\StoreAboutUsRequest;

use App\Http\Requests\UpdateAboutUsRequest;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutSections = AboutUs::all();
        return view('admin.about.index', compact('aboutSections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutUsRequest $request)
    {
        AboutUs::create($request->validated());

        return redirect()->route('admin.about.index')->with('success', 'Section added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $aboutSection)
    {
        return view('admin.about.edit', compact('aboutSection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutSection)
    {
        $aboutSection->update($request->validated());

        return redirect()->route('admin.about.index')->with('success', 'Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $aboutSection)
    {
        $aboutSection->delete();

        return redirect()->route('admin.about.index')->with('success', 'Section deleted successfully');
    }
}