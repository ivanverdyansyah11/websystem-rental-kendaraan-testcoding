<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laporan extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    public function pengguna()
    {
        return $this->belongsTo(Auth::class, 'penggunas_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'relations_id');
    }

    public function sopir()
    {
        return $this->belongsTo(Sopir::class, 'relations_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'relations_id');
    }
}
