<?php

namespace Database\Seeders;

use App\Models\SeriKendaraan;
use Illuminate\Database\Seeder;

class SeriKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeriKendaraan::create([
            'nomor_seri' => '00656676867',
            'jenis_kendaraans_id' => 1,
            'brand_kendaraans_id' => 1,
        ]);

        SeriKendaraan::create([
            'nomor_seri' => '00546546768',
            'jenis_kendaraans_id' => 2,
            'brand_kendaraans_id' => 2,
        ]);
    }
}
