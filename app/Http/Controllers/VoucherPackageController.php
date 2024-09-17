<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoucherPackageRequest;
use App\Models\Location;
use App\Models\VoucherPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Location $location)
    {
        $voucher_packages = $location->voucher_packages()->latest()->get();
        return view('admin.voucher_packages.index', compact('location', 'voucher_packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Location $location)
    {
        return view('admin.voucher_packages.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoucherPackageRequest $request, Location $location)
    {
        DB::transaction(function () use ($request, $location) {
            
            $location->voucher_packages()->create([
                'name' => $request->name,
                'price' => $request->price,
            ]);
        });

        return redirect()->route('admin.voucher_packages.index', $location);   
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
    public function edit(Location $location, VoucherPackage $voucherPackage)
    {
        return view('admin.voucher_packages.edit', compact('location', 'voucherPackage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location, VoucherPackage $voucherPackage)
    {
        DB::transaction(function () use ($request, $voucherPackage) {
            
            $voucherPackage->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);
        });
    
        return redirect()->route('admin.voucher_packages.index', ['location' => $location]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, VoucherPackage $voucherPackage)
    {
        $voucherPackage->delete();

        return redirect()->route('admin.voucher_packages.index', ['location' => $location]);
    }
}
