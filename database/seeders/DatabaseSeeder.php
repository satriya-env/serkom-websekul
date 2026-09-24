<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name'     => 'farhan el',
            'username' => 'goat',
            'password' => Hash::make('qwerty'),
            'role'     => 'Admin',
            'status'   => 'Aktif',
        ]);

        DB::table('profil')->insert([
            'namaSekolah'   => 'SMK YPC',
            'kepalaSekolah' => 'Ujang Sanusi M.M.',
            'foto'          => 'null',
            'logo'          => 'null',
            'npsn'          => '31890',
            'alamat'        => 'singaparna, tasikmalaya',
            'kontak'        => '081234567890',
            'visiMisi'      => "Siap kerja Siap berusaha Siap sukses!",
            'tahunBerdiri'  => '1997',
            'deskripsi'     => 'ini desckripci ya',
        ]);
    }
}