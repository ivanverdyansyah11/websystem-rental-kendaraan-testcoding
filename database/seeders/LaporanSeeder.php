<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 1,
            'kategori_laporan' => 'pelanggan',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 2,
            'kategori_laporan' => 'pelanggan',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 3,
            'kategori_laporan' => 'pelanggan',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 1,
            'kategori_laporan' => 'sopir',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 2,
            'kategori_laporan' => 'sopir',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 3,
            'kategori_laporan' => 'sopir',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 1,
            'kategori_laporan' => 'kendaraan',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 2,
            'kategori_laporan' => 'kendaraan',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 3,
            'kategori_laporan' => 'kendaraan',
        ]);

        Laporan::create([
            'penggunas_id' => 1,
            'relations_id' => 4,
            'kategori_laporan' => 'kendaraan',
        ]);
    }
}
