<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductIdentityRequest;
use App\Http\Requests\UpdateProductIdentityRequest;
use App\Models\ProductIdentity;
use Illuminate\Http\Request;

class ProductIdentityController extends Controller
{
    public function index()
    {
        $productIdentities = ProductIdentity::all();
        return view('product_identities.index', compact('productIdentities'));
    }

    public function create()
    {
        return view('product_identities.create');
    }

    public function store(StoreProductIdentityRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos');
        }

        ProductIdentity::create($data);

        return redirect()->route('product_identities.index')->with('success', 'Product identity created successfully.');
    }

    public function edit(ProductIdentity $productIdentity)
    {
        return view('product_identities.edit', compact('productIdentity'));
    }

    public function update(UpdateProductIdentityRequest $request, ProductIdentity $productIdentity)
    {
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('logos');
        }

        $productIdentity->update($data);

        return redirect()->route('product_identities.index')->with('success', 'Product identity updated successfully.');
    }

    public function destroy(ProductIdentity $productIdentity)
    {
        $productIdentity->delete();

        return redirect()->route('product_identities.index')->with('success', 'Product identity deleted successfully.');
    }
}

