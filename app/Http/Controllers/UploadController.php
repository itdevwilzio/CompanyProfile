<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Check if there is an uploaded file
        if ($request->hasFile('upload')) {
            // Store the file in the "public/uploads" directory
            $file = $request->file('upload');
            $path = $file->store('public/uploads');  // Save file in storage/app/public/uploads
            $url = Storage::url($path);  // Generate the URL for accessing the file

            // Return a JSON response as required by CKEditor
            return response()->json([
                'uploaded' => 1,
                'fileName' => $file->getClientOriginalName(),
                'url' => $url
            ]);
        }

        // Return an error message if the file was not uploaded
        return response()->json(['uploaded' => 0, 'error' => ['message' => 'File upload failed']]);
    }
}
