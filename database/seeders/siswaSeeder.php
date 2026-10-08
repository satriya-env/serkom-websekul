<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('siswa')->insert([
            'nisn' => '11111111',
            'namaSiswa' => 'adul',
            'jenisKelamin' => 'Laki-laki',
            'tahunMasuk' => 2024,
        ]);
    }
}
