<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    //
    public function showIdentity()
    {
        $product = TentangKami::where('name', 'WIJA BACKBONE')->first();
        return view('product.identity', compact('product'));
    }

    // Method to show APJII registration information
    public function showAPJIIRegistration()
    {
        $apjiiRegistration = TentangKami::where('name', 'APJII Registration')->first();
        return view('product.apjii', compact('apjiiRegistration'));
    }
}
