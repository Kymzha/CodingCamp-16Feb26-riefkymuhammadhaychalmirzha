<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Administrasi;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Dokter::factory(10)->create();

        Pasien::factory(20)->create();

        Administrasi::factory(30)->create();
    }
}
