<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Eskul;
use App\Models\Galeri;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            userSeeder::class,
            profilSeeder::class,
            siswaSeeder::class,
            guruSeeder::class,
            jurusanSeeder::class,
            eskulSeeder::class,
            beritaSeeder::class,
            galeriSeeder::class,
            sosmedSeeder::class
        ]);
    }
}