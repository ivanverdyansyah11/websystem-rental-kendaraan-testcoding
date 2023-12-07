<?php

namespace Database\Seeders;

use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKendaraan::create([
            'nama' => 'Kendaraan Beroda 2',
        ]);

        JenisKendaraan::create([
            'nama' => 'Kendaraan Beroda 4',
        ]);
    }
}
