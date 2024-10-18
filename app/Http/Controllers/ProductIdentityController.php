<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductIdentityRequest;
use App\Http\Requests\UpdateProductIdentityRequest;
use App\Models\ProductIdentity;
use Illuminate\Http\Request;

class ProductIdentityController extends Controller
{
    /**
     * Display a listing of the product identities.
     */
    public function index()
    {
        $product_identities = ProductIdentity::all();
        return view('admin.product_identities.index', compact('product_identities'));
    }

    /**
     * Show the form for creating a new product identity.
     */
    public function create()
    {
        return view('admin.product_identities.create');
    }

    /**
     * Store a newly created product identity in storage.
     */
    public function store(StoreProductIdentityRequest $request)
    {
        $data = $request->validated();

        // Handle file upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('product_identities', 'public');
        }

        ProductIdentity::create($data);

        return redirect()->route('admin.product_identities.index')->with('success', 'Product identity created successfully.');
    }

    /**
     * Show the form for editing the specified product identity.
     */
    public function edit(ProductIdentity $productIdentity)
    {
        return view('admin.product_identities.edit', compact('productIdentity'));
    }

    /**
     * Update the specified product identity in storage.
     */
    public function update(UpdateProductIdentityRequest $request, ProductIdentity $productIdentity)
    {
        $data = $request->validated();

        // Handle file upload if a new logo is provided
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $productIdentity->update($data);

        return redirect()->route('admin.product_identities.index')->with('success', 'Product identity updated successfully.');
    }

    /**
     * Remove the specified product identity from storage.
     */
    public function destroy(ProductIdentity $productIdentity)
    {
        $productIdentity->delete();

        return redirect()->route('admin.product_identities.index')->with('success', 'Product identity deleted successfully.');
    }
}
