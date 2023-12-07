<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelanggan::create([
            'nama' => 'Bayu Pradana',
            'nik' => '00454654435',
            'nomor_telepon' => '08123456789',
            'nomor_ktp' => '34265768645',
            'nomor_kk' => '34556565734',
            'alamat' => 'Jl. Ahmad Yani',
            'data_ktp' => 'benar',
            'data_kk' => 'benar',
            'data_nomor_telepon' => 'benar',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_kk' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Pelanggan::create([
            'nama' => 'Ayu Saputri',
            'nik' => '3454657568',
            'nomor_telepon' => '08987654321',
            'nomor_ktp' => '45634645657',
            'nomor_kk' => '34354657657',
            'alamat' => 'Jl. Dalung',
            'data_ktp' => 'benar',
            'data_kk' => 'benar',
            'data_nomor_telepon' => 'benar',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_kk' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Pelanggan::create([
            'nama' => 'Pratama Yoga',
            'nik' => '34564575678',
            'nomor_telepon' => '08123456789',
            'nomor_ktp' => '8956757567678',
            'nomor_kk' => '45646578686',
            'alamat' => 'Jl. Cargo Sari',
            'data_ktp' => 'benar',
            'data_kk' => 'benar',
            'data_nomor_telepon' => 'benar',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_kk' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);
    }
}
