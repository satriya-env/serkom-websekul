<?php

namespace Database\Seeders;

use App\Models\mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class mapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        mapel::create([
            'pelajaran' => 'Matematika',
            'alias' => 'MAT',
        ]);
        mapel::create([
            'pelajaran' => 'Praktek Ibadah',
            'alias' => 'PIB',
        ]);
        mapel::create([
            'pelajaran' => 'Bahasa Indonesia',
            'alias' => 'BID',
        ]);
    }
}
