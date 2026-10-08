<?php

namespace Database\Seeders;

use App\Models\Eskul;
use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class eskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $guru = Guru::first();

        // ARIYAPALA
        Eskul::create([
            'namaEskul' => 'Ariyapala',
            'pembina' => 'Munawar Zaelani',
            'jadwalLatihan' => 'Minggu',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/arpal.png',
            'idGuru' => $guru->id
        ]);
        // FUTSAL
        Eskul::create([
            'namaEskul' => 'Futsal',
            'pembina' => '-',
            'jadwalLatihan' => '-',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/futsal.png',
            'idGuru' => $guru->id
        ]);
        // OSIS
        Eskul::create([
            'namaEskul' => 'OSIS',
            'pembina' => 'Salman Febriana Alfaridi',
            'jadwalLatihan' => '-',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/osis.png',
            'idGuru' => $guru->id
        ]);
        // PASKIBRA
        Eskul::create([
            'namaEskul' => 'PASKIBRA',
            'pembina' => '-',
            'jadwalLatihan' => '-',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/paskib.png',
            'idGuru' => $guru->id
        ]);
        // PKS
        Eskul::create([
            'namaEskul' => 'PKS (Patroli Keamanan Siswa)',
            'pembina' => '-',
            'jadwalLatihan' => '-',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/pks.png',
            'idGuru' => $guru->id
        ]);
        // PMR
        Eskul::create([
            'namaEskul' => 'PMR (Palang Merah Remaja)',
            'pembina' => '-',
            'jadwalLatihan' => 'Jumat',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/pmr.png',
            'idGuru' => $guru->id
        ]);
        // POLSIS
        Eskul::create([
            'namaEskul' => 'POLSIS (Polisi Siswa)',
            'pembina' => '-',
            'jadwalLatihan' => '-',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/polsis.png',
            'idGuru' => $guru->id
        ]);
        // PRAMUKA
        Eskul::create([
            'namaEskul' => 'Pramuka',
            'pembina' => '-',
            'jadwalLatihan' => 'Sabtu',
            'deskripsi' => 'Lorem Ipsum',
            'gambar' => 'eskul/pramuka.png',
            'idGuru' => $guru->id
        ]);
    }
}
