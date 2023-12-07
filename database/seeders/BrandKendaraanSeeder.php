<?php

namespace Database\Seeders;

use App\Models\BrandKendaraan;
use Illuminate\Database\Seeder;

class BrandKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandKendaraan::create([
            'nama' => 'Honda',
        ]);

        BrandKendaraan::create([
            'nama' => 'Toyota',
        ]);
    }
}
