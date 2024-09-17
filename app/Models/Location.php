<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image'
    ];

    public function voucher_packages()
    {
        return $this->hasMany(VoucherPackage::class);
    }
}
