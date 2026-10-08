<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class guruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Guru::create([
            'nip' => '123456789012345',
            'namaGuru' => 'Alamsyah Firdaus',
            'mapel' => 'Kejuruan PPLG',
            'foto' => 'guru/king.jpg',
        ]);
    }
}
