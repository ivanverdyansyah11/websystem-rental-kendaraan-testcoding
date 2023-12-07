<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembayaranPemesanan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function kendaraans()
    {
        return $this->hasMany(Kendaraan::class, 'kendaraans_id');
    }

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'sopirs_id');
    }

    public function pelepasan_pemesanan()
    {
        return $this->belongsTo(PelepasanPemesanan::class, 'pelepasan_pemesanans_id');
    }
}
