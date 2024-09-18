<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
