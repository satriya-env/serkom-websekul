<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
