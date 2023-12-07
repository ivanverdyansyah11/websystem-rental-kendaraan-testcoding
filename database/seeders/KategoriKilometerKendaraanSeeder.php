<?php

namespace Database\Seeders;

use App\Models\KategoriKilometerKendaraan;
use Illuminate\Database\Seeder;

class KategoriKilometerKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriKilometerKendaraan::create([
            'jumlah' => '2500',
        ]);

        KategoriKilometerKendaraan::create([
            'jumlah' => '5000',
        ]);

        KategoriKilometerKendaraan::create([
            'jumlah' => '10000',
        ]);
    }
}
