<?php

namespace App\Http\Controllers;

use Cloudinary\Configuration\Configuration;
use Illuminate\Http\Request;

class ImageCloudinaryController extends Controller
{
    public function configureCloudinary()
    {
        // Configure Cloudinary globally via a JSON object
        Configuration::instance([
            'cloud' => [
                'cloud_name' => 'dvhyegyld',  // Replace with your Cloudinary cloud name
                'api_key' => '297384164736314',        // Replace with your Cloudinary API key
                'api_secret' => 'U23lUL5Uf17QC1IWeTjOvHH3hog'   // Replace with your Cloudinary API secret
            ],
            'url' => [
                'secure' => true
            ]
        ]);

        // Alternatively, configure programmatically
        $config = Configuration::instance();
        $config->cloud->cloudName = 'dvhyegyld';  // Replace with your Cloudinary cloud name
        $config->cloud->apiKey = '297384164736314';        // Replace with your Cloudinary API key
        $config->cloud->apiSecret = 'U23lUL5Uf17QC1IWeTjOvHH3hog';  // Replace with your Cloudinary API secret
        $config->url->secure = true;

        return response()->json(['status' => 'Cloudinary configuration successful']);
    }
}