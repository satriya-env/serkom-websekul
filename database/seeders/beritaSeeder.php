<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class beritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::first();
        Berita::create([
            'judul' => 'Pelaksanaan Sholat Dzuhur',
            'slug' => 'pelaksanaan-sholat-dzuhur',
            'isi' => 'Kini seluruh siswa melaksanakan sholat dzuhur di RPS secara berjamaah',
            'tanggal' => now()->subDays(1)->toDateString(),
            'gambar' => 'berita/sample.png',
            'status' => 'Publish',
            'idUser' => $user->id,
        ]);
    }
}
