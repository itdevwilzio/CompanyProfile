<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

     // Define the fillable fields
     protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'type',
        'keypoints',
    ];

    // Cast keypoints to JSON
    protected $casts = [
        'keypoints' => 'array',
    ];
}
