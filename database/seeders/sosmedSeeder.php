<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sosmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('sosmed')->insert([
            [
                'platform' => 'facebook',
                'link' => 'https://www.facebook.com/smkypc/',
            ],
            [
                'platform' => 'instagram',
                'link' => 'https://www.instagram.com/smksypctasikmalaya/',
            ],
            [
                'platform' => 'youtube',
                'link' => 'https://www.youtube.com/@smkypctasikmalaya',
            ],
            [
                'platform' => 'tiktok',
                'link' => 'https://www.tiktok.com/@smkypc',
            ],
            [
                'platform' => 'whatsapp',
                'link' => 'https://wa.me/628112224563',
            ],
        ]);
    }
}
