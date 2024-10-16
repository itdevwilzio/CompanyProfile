<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'description2',
        'description3',
        'description4',
        'description5',
        'thumbnail',
        'type',
        'keypoints',
    ];
}
