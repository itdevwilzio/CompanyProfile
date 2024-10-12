<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKami extends Model
{
    use HasFactory;

     // Define the fillable fields
     protected $fillable = [
        'name',
        'description',
        'logo',
        'apjii_registered',
    ];
}
