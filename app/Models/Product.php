<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Auditable
{
    use HasFactory, SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    // Tambahkan kolom yang ingin diaudit
    protected $auditInclude = ['name', 'price', 'thumbnail'];

    // Exclude kolom tertentu jika diperlukan
    protected $auditExclude = ['created_at', 'updated_at'];

    protected $fillable = [
        'name',
        'tagline',
        'thumbnail',
        'about'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

     // Menambahkan user ID untuk create, update, dan delete
     public static function boot()
     {
         parent::boot();
 
         static::creating(function ($model) {
             $model->created_by = auth()->id();
         });
 
         static::updating(function ($model) {
             $model->updated_by = auth()->id();
         });
 
         static::deleting(function ($model) {
             $model->deleted_by = auth()->id();
             $model->save();  // Simpan `deleted_by` sebelum soft delete
         });
     }
 
     // Relasi untuk user yang membuat produk
     public function createdBy()
     {
         return $this->belongsTo(User::class, 'created_by');
     }
 
     // Relasi untuk user yang mengupdate produk
     public function updatedBy()
     {
         return $this->belongsTo(User::class, 'updated_by');
     }
 
     // Relasi untuk user yang menghapus produk
     public function deletedBy()
     {
         return $this->belongsTo(User::class, 'deleted_by');
     }
}
