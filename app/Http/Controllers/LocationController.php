<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        // dd($locations);

        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // Store image file
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('locations', 'public');
    
                    // Create new location
                    Location::create([
                        'name' => $request->name,
                        'image' => $imagePath,
                        'description' => $request->description,
                    ]);
                } else {
                    throw new \Exception('Image file not provided.');
                }
            });
    
            // Redirect with success message
            return redirect()->route('admin.locations.index')
                             ->with('success', 'Location added successfully!');
        } catch (\Exception $e) {
            // Redirect with error message if something fails
            return redirect()->back()
                             ->with('error', 'There was an error while adding the location: ' . $e->getMessage())
                             ->withInput();
        }
        return redirect()->route('admin.locations.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::find($id);

        return view('admin.locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        DB::transaction(function () use ($request, $location) {
            $validated = $request->validated();

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('locations', 'public');
                $validated['image'] = $imagePath;
            }

            $location->update($validated);
        });

        return redirect()->route('admin.locations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        DB::transaction(function () use ($location) {
            $location->delete();
        });
        return redirect()->route('admin.locations.index');
    }
}
