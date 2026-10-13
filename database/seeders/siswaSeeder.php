<?php

namespace Database\Seeders;

use App\Models\kelas;
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
        $kelas = kelas::first();

        for ($i=0; $i < 25; $i++) { 
            DB::table('siswa')->insert([
                'nisn' => '11111111',
                'namaSiswa' => 'adul',
                'jenisKelamin' => 'Laki-laki',
                'kelas' => $kelas->id,
                'tahunMasuk' => 2024,
            ]);
        }
        
    }
}
