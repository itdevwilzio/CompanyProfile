<?php

namespace App\Observers;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;
use Illuminate\Support\Facades\Storage;

class ImageObserver
{
    /**
     * Handle the Image "created" event.
     */
    public function created(Image $image): void
    {
        // Check if there is an image file path
        if ($image->file_path) {
            $this->convertToWebp($image->file_path);
        }
    }

    /**
     * Convert an image to WebP format and save it.
     *
     * @param  string  $filePath
     * @return void
     */
    private function convertToWebp($filePath)
    {
        // Get the original image path
        $originalPath = Storage::path($filePath);

        // Define the new WebP path
        $filename = pathinfo($filePath, PATHINFO_FILENAME);
        $webpPath = "images/{$filename}.webp";

        // Convert to WebP format
        SpatieImage::load($originalPath)
            ->format(\Spatie\Image\Manipulations::FORMAT_WEBP)
            ->save(Storage::path($webpPath));

        // Optimize the WebP image
        ImageOptimizer::optimize(Storage::path($webpPath));
    }
}
