<?php

namespace Database\Seeders;

use App\Models\Sopir;
use Illuminate\Database\Seeder;

class SopirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sopir::create([
            'nama' => 'Agus Wirawan',
            'nik' => '867745675676',
            'nomor_telepon' => '089734536453',
            'nomor_ktp' => '345465768',
            'nomor_sim' => '32435466576',
            'alamat' => 'Jl. Cargo',
            'data_ktp' => 'benar',
            'data_sim' => 'benar',
            'data_nomor_telepon' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_sim' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Sopir::create([
            'nama' => 'Dewi Cindrawati',
            'nik' => '0845345456554',
            'nomor_telepon' => '0897645312',
            'nomor_ktp' => '457567686789',
            'nomor_sim' => '65678686767',
            'alamat' => 'Jl. Gatsu Utara',
            'data_ktp' => 'benar',
            'data_sim' => 'benar',
            'data_nomor_telepon' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_sim' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);

        Sopir::create([
            'nama' => 'Segara Putra',
            'nik' => '45645657564545',
            'nomor_telepon' => '0875674565475',
            'nomor_ktp' => '6756435657567',
            'nomor_sim' => '2343534545675',
            'alamat' => 'Jl. Dalung Permai',
            'data_ktp' => 'benar',
            'data_sim' => 'benar',
            'data_nomor_telepon' => 'benar',
            'status' => 'ada',
            'kelengkapan_ktp' => 'belum lengkap',
            'kelengkapan_sim' => 'belum lengkap',
            'kelengkapan_nomor_telepon' => 'lengkap',
        ]);
    }
}
