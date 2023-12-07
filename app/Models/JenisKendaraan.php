<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKendaraan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function seri_kendaraan()
    {
        return $this->belongsTo(SeriKendaraan::class, 'id');
    }
}
