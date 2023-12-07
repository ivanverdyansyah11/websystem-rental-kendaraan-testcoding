<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeriKendaraan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'id');
    }

    public function jenis_kendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class, 'jenis_kendaraans_id');
    }

    public function brand_kendaraan()
    {
        return $this->belongsTo(BrandKendaraan::class, 'brand_kendaraans_id');
    }
}
