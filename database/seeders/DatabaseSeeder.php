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

        //TABLE PROFIL
            DB::table('profil')->insert([
                'namaSekolah'   => 'SMK YPC',
                'kepalaSekolah' => 'Ujang Sanusi M.M.',
                'foto'          => 'profil/foto/sample.jpg',
                'logo'          => 'profil/logo/sample.png',
                'npsn'          => '31890',
                'alamat'        => 'singaparna, tasikmalaya',
                'kontak'        => '081234567890',
                'visiMisi'      => "Siap kerja Siap berusaha Siap sukses!",
                'tahunBerdiri'  => '1997',
                'deskripsi'     => 'ini desckripci ya',
            ]);
        
        //TABLE USER
            $user = User::factory()->create([
                'id' => (string) Str::uuid(),
                'name'     => 'atminWeb',
                'username' => 'admin1',
                'password' => Hash::make('password'),
                'role'     => 'Admin',
                'status'   => 'Aktif',
            ]);
            User::factory()->create([
                'name'     => 'akunOperator',
                'username' => 'akun1',
                'password' => Hash::make('123456'),
                'role'     => 'Operator',
                'status'   => 'Aktif',
            ]);

        //TABLE SISWA
            Siswa::create([
                'nisn' => '11111111',
                'namaSiswa' => 'adul',
                'jenisKelamin' => 'Laki-laki',
                'tahunMasuk' => 2024,
            ]);

        //TABLE GURU
            $guru = Guru::create([
                'nip' => '123456789012345',
                'namaGuru' => 'Alamsyah Firdaus',
                'mapel' => 'Kejuruan PPLG',
                'foto' => 'guru/king.jpg',
            ]);

        //TABLE GALERI
            Galeri::create([
                'judul'=> 'Fasilitas Lab',
                'keterangan'=> 'Fasilitas Lab',
                'file'=> 'galeri/sample.png',
                'kategori'=> 'Foto',
                'tanggal'=> '2026-09-26',
            ]);

        //TABLE BERITA
            Berita::create([
                'judul' => 'Pelaksanaan Sholat Dzuhur',
                'slug' => 'pelaksanaan-sholat-dzuhur',
                'isi' => 'Kini seluruh siswa melaksanakan sholat dzuhur di RPS secara berjamaah',
                'tanggal' => now()->subDays(1)->toDateString(),
                'gambar' => 'berita/sample.png',
                'status' => 'Publish',
                'idUser' => $user->id,
            ]);
        //TABLE ESKUL
            Eskul::create([
                'namaEskul' => 'Ariyapala',
                'pembina' => 'Munawar Zaelani',
                'jadwalLatihan' => 'Minggu',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/arpal.png',
                'idGuru' => $guru->id
            ]);
            Eskul::create([
                'namaEskul' => 'Futsal',
                'pembina' => '-',
                'jadwalLatihan' => '-',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/futsal.png',
                'idGuru' => $guru->id
            ]);
            Eskul::create([
                'namaEskul' => 'OSIS',
                'pembina' => 'Salman Febriana Alfaridi',
                'jadwalLatihan' => '-',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/osis.png',
                'idGuru' => $guru->id
            ]);
            Eskul::create([
                'namaEskul' => 'PASKIBRA',
                'pembina' => '-',
                'jadwalLatihan' => '-',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/paskib.png',
                'idGuru' => $guru->id
            ]);
            Eskul::create([
                'namaEskul' => 'PKS (Patroli Keamanan Siswa)',
                'pembina' => '-',
                'jadwalLatihan' => '-',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/pks.png',
                'idGuru' => $guru->id
            ]);
            Eskul::create([
                'namaEskul' => 'PMR (Palang Merah Remaja)',
                'pembina' => '-',
                'jadwalLatihan' => 'Jumat',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/pmr.png',
                'idGuru' => $guru->id
            ]);
            Eskul::create([
                'namaEskul' => 'POLSIS (Polisi Siswa)',
                'pembina' => '-',
                'jadwalLatihan' => '-',
                'deskripsi' => 'Lorem Ipsum',
                'gambar' => 'eskul/polsis.png',
                'idGuru' => $guru->id
            ]);
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