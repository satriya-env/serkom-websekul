<?php

namespace Database\Seeders;

use App\Models\Berita;
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
        // User::factory(10)->create();

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
                'namaSiswa' => 'adul holic',
                'jenisKelamin' => 'Laki-laki',
                'tahunMasuk' => 2024,
            ]);

        //TABLE GURU
            Guru::create([
                'nip' => '123456789012345',
                'namaGuru' => 'Alamsyah Firdaus',
                'mapel' => 'Kejuruan PPLG',
                'foto' => 'guru/foto/sample.jpg',
            ]);

        //TABLE GALERI
            Galeri::create([
                'judul'=> 'Fasilitas Lab',
                'keterangan'=> 'Fasilitas Lab',
                'file'=> 'galeri/sample.jpg',
                'kategori'=> 'Foto',
                'tanggal'=> '2026-09-26',
            ]);

        //TABLE BERITA
            Berita::create([
                'judul' => 'dummyData',
                'isi' => 'dummyDatadummy DatadummyData dummyData',
                'tanggal' => '2026-09-26',
                'gambar' => 'berita/sample.png',
                'status' => 'Draf',
                'idUser' => $user->id,
            ]);
    }
}