<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function show(Product $product)
{
    return view('front.products.show', compact('product'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Handle the thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            // Create the product with the validated data
            Product::create($validated);
        });

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateProductRequest $request, Product $product)
    {
        DB::transaction(function () use ($request, $product) {
            $validated = $request->validated();
    
            // Handle the thumbnail upload
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }
    
            // Regenerate the slug based on the name, only if the name changes
            if ($product->name !== $validated['name']) {
                $slug = Str::slug($validated['name']);
    
                // Ensure slug uniqueness, in case the same slug already exists
                $existingSlugCount = Product::where('slug', $slug)->where('id', '!=', $product->id)->count();
                if ($existingSlugCount > 0) {
                    $slug .= '-' . ($existingSlugCount + 1); // Add a number to the slug if a conflict is found
                }
    
                $validated['slug'] = $slug;
            }
    
            // Update the product with the validated data
            $product->update($validated);
        });
    
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->delete();
        });

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
