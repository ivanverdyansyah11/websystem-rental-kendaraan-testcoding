<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kendaraan::create([
            'jenis_kendaraans_id' => 1,
            'brand_kendaraans_id' => 1,
            'seri_kendaraans_id' => 1,
            'kategori_kilometer_kendaraans_id' => 3,
            'foto_kendaraan' => 'sample-1.jpg',
            'stnk_nama' => 'Dimas Saputra',
            'nomor_plat' => 'DK 234 JGH',
            'kilometer' => '10000',
            'kilometer_saat_ini' => '10000',
            'tarif_sewa_hari' => '300000',
            'tarif_sewa_minggu' => '1200000',
            'tarif_sewa_bulan' => '4600000',
            'tahun_pembuatan' => '2018',
            'tanggal_pembelian' => '2023-09-10',
            'warna' => 'Kuning',
            'nomor_rangka' => '63456457457',
            'nomor_mesin' => '23453254657',
            'status' => 'ready',
        ]);

        Kendaraan::create([
            'jenis_kendaraans_id' => 2,
            'brand_kendaraans_id' => 2,
            'seri_kendaraans_id' => 2,
            'kategori_kilometer_kendaraans_id' => 2,
            'foto_kendaraan' => 'sample-2.jpg',
            'stnk_nama' => 'Putri Sekar Wangi',
            'nomor_plat' => 'B 754 POA',
            'kilometer' => '5000',
            'kilometer_saat_ini' => '5000',
            'tarif_sewa_hari' => '200000',
            'tarif_sewa_minggu' => '1000000',
            'tarif_sewa_bulan' => '3000000',
            'tahun_pembuatan' => '2020',
            'tanggal_pembelian' => '2023-10-08',
            'warna' => 'Merah',
            'nomor_rangka' => '345646577',
            'nomor_mesin' => '235234354657',
            'status' => 'ready',
        ]);

        Kendaraan::create([
            'jenis_kendaraans_id' => 1,
            'brand_kendaraans_id' => 2,
            'seri_kendaraans_id' => 1,
            'kategori_kilometer_kendaraans_id' => 2,
            'foto_kendaraan' => 'sample-3.jpg',
            'stnk_nama' => 'Ranti Sekarini',
            'nomor_plat' => 'L 453 HAU',
            'kilometer' => '7000',
            'kilometer_saat_ini' => '7000',
            'tarif_sewa_hari' => '300000',
            'tarif_sewa_minggu' => '1200000',
            'tarif_sewa_bulan' => '3000000',
            'tahun_pembuatan' => '2023',
            'tanggal_pembelian' => '2023-10-08',
            'warna' => 'Kuning',
            'nomor_rangka' => '3456456575687',
            'nomor_mesin' => '234234345456',
            'status' => 'ready',
        ]);

        Kendaraan::create([
            'jenis_kendaraans_id' => 2,
            'brand_kendaraans_id' => 1,
            'seri_kendaraans_id' => 2,
            'kategori_kilometer_kendaraans_id' => 1,
            'foto_kendaraan' => 'sample-4.jpg',
            'stnk_nama' => 'Dewa Putra',
            'nomor_plat' => 'A 81 JQB',
            'kilometer' => '10000',
            'kilometer_saat_ini' => '10000',
            'tarif_sewa_hari' => '400000',
            'tarif_sewa_minggu' => '1500000',
            'tarif_sewa_bulan' => '4000000',
            'tahun_pembuatan' => '2021',
            'tanggal_pembelian' => '2023-10-08',
            'warna' => 'Merah',
            'nomor_rangka' => '674567687684',
            'nomor_mesin' => '98785454657',
            'status' => 'ready',
        ]);
    }
}
