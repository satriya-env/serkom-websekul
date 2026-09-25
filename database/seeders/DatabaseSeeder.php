<?php

namespace Database\Seeders;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        User::factory()->create([
            'name'     => 'farhan el',
            'username' => 'goat',
            'password' => Hash::make('sendisehatsemangatgowes'),
            'role'     => 'Admin',
            'status'   => 'Aktif',
        ]);

        //TABLE SISWA
        Siswa::create([
            'nisn' => '11111111',
            'namaSiswa' => 'adul holic',
            'jenisKelamin' => 'Laki-laki',
            'tahunMasuk' => 2024,
        ]);

        // TABLE GURU
        Guru::create([
            'nip' => '123456789012345',
            'namaGuru' => 'Alamsyah Firdaus',
            'mapel' => 'Kejuruan PPLG',
            'foto' => 'guru/foto/sample.jpg',
        ]);
    }
}