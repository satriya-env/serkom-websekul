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
        // Guru::create([
        //     'nip' => '123456789012345',
        //     'namaGuru' => 'tes',
        //     'mapel' => 'Kejuruan PPLG',
        //     'foto' => '',
        // ]);
        for ($i = 1; $i <= 15; $i++) {
            Guru::create([
                // sprintf dipake biar NIP punya format unik misal 123456789012301, 123456789012302, dst.
                'nip' => '1234567890123' . sprintf('%02d', $i), 
                'namaGuru' => 'Guru Tes ',
                'mapel' => 'ABCD',
                'foto' => '',
            ]);
        }
    }
}
