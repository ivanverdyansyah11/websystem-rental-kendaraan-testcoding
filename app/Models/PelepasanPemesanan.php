<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PelepasanPemesanan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraans_id');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanans_id');
    }

    public function pembayaran_pemesanan()
    {
        return $this->belongsTo(PembayaranPemesanan::class, 'id');
    }
}
