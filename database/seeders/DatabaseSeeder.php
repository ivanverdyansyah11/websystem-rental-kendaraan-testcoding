<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthSeeder::class);
        $this->call(BrandKendaraanSeeder::class);
        $this->call(JenisKendaraanSeeder::class);
        $this->call(SeriKendaraanSeeder::class);
        $this->call(KategoriKilometerKendaraanSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(LaporanSeeder::class);
        $this->call(PelangganSeeder::class);
        $this->call(SopirSeeder::class);
    }
}
