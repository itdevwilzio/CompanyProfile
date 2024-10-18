<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIdentity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'logo',
        'details',
        'vision',
        'mission',
        'contentl1',
        'contentl2',
        'contentl3',
    ];
}
