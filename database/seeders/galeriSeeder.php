<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class galeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Galeri::create([
            'judul'=> 'Fasilitas Lab',
            'keterangan'=> 'Fasilitas Lab',
            'file'=> 'galeri/sample.png',
            'kategori'=> 'Foto',
            'tanggal'=> '2026-09-26',
        ]);
    }
}
