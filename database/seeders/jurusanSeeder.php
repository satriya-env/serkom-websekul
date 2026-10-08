<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jurusan')->insert([
            [
                'alias' => 'BD',
                'nama' => 'Bisnis Digital',
                'logo' => 'jurusan/logo/bd.png',
                'gambar' => 'jurusan/bd.jpg',
                'deskripsi' => 'Mempelajari pemasaran digital, e-commerce, dan pengelolaan usaha berbasis teknologi agar siswa siap berwirausaha maupun bekerja di perusahaan modern.',
                'materi' => 'Digital Marketing, E-Commerce, Administrasi Bisnis, Manajemen Usaha',
                'karier' => 'Digital marketer, Admin toko online, Wirausahawan, Staf pemasaran dan penjualan',
            ],
            [
                'alias' => 'DKV',
                'nama' => 'Desain Komunikasi Visual',
                'logo' => 'jurusan/logo/dkv.png',
                'gambar' => 'jurusan/dkv.jpeg',
                'deskripsi' => 'Mengembangkan kemampuan desain grafis, ilustrasi, fotografi, dan produksi konten visual untuk kebutuhan media cetak maupun digital.',
                'materi' => 'Desain Grafis, Ilustrasi, Fotografi, Videografi',
                'karier' => 'Desainer grafis, Content creator, Fotografer / videografer, Staf percetakan dan periklanan',
            ],
            [
                'alias' => 'TKJ',
                'nama' => 'Teknik Komputer dan Jaringan',
                'logo' => 'jurusan/logo/tkj.png',
                'gambar' => 'jurusan/tkj.png',
                'deskripsi' => 'Mempelajari instalasi, konfigurasi, dan pengamanan jaringan komputer serta telekomunikasi.',
                'materi' => 'Jaringan Komputer, Administrasi Server, Keamanan Jaringan, Perakitan PC',
                'karier' => 'Teknisi jaringan, Network administrator, Teknisi ISP, IT support',
            ],
            [
                'alias' => 'RPL',
                'nama' => 'Rekayasa Perangkat Lunak',
                'logo' => 'jurusan/logo/rpl.png',
                'gambar' => 'jurusan/rpl.png',
                'deskripsi' => 'Mempelajari pemrograman, pengembangan aplikasi web dan mobile, serta pengelolaan basis data.',
                'materi' => 'Pemrograman Web, Aplikasi Mobile, Basis Data, UI/UX Dasar',
                'karier' => 'Web developer, Mobile developer, Programmer',
            ],
            [
                'alias' => 'TEKLIN',
                'nama' => 'Teknik Elektronika Industri',
                'logo' => 'jurusan/logo/teklin.png',
                'gambar' => 'jurusan/teklin.png',
                'deskripsi' => 'Mempelajari rangkaian elektronika, sistem kontrol, otomasi, dan perawatan peralatan elektronik industri.',
                'materi' => 'Rangkaian Elektronika, PLC dan Otomasi, Sistem Kontrol, Instrumentasi',
                'karier' => 'Teknisi elektronika, Operator mesin otomasi, Teknisi maintenance pabrik, Teknisi servis elektronik',
            ],
            [
                'alias' => 'DPIB',
                'nama' => 'Desain Pemodelan dan Informasi Bangunan',
                'logo' => 'jurusan/logo/dpib.png',
                'gambar' => 'jurusan/dpib.png',
                'deskripsi' => 'Mempelajari gambar teknik, pemodelan 3D, dan perencanaan bangunan menggunakan perangkat lunak desain.',
                'materi' => 'Gambar Teknik, AutoCAD, Pemodelan 3D, Estimasi Biaya Bangunan',
                'karier' => 'Drafter, Juru gambar arsitektur, Pengawas lapangan, Estimator konstruksi',
            ],
            [
                'alias' => 'TKR',
                'nama' => 'Teknik Kendaraan Ringan',
                'logo' => 'jurusan/logo/tkr.png',
                'gambar' => 'jurusan/tkr.png',
                'deskripsi' => 'Mempelajari perawatan, perbaikan, dan diagnosis mesin serta sistem kelistrikan kendaraan ringan.',
                'materi' => 'Servis Mesin, Kelistrikan Otomotif, Chassis dan Pemindah Tenaga, Diagnosis Kendaraan',
                'karier' => 'Mekanik bengkel, Teknisi dealer resmi, Service advisor, Pemilik bengkel',
            ],
            [
                'alias' => 'TBSM',
                'nama' => 'Teknik Bisnis Sepeda Motor',
                'logo' => 'jurusan/logo/tbsm.png',
                'gambar' => 'jurusan/tbsm.png',
                'deskripsi' => 'Mempelajari servis sepeda motor serta pengelolaan bisnis bengkel dan penjualan sepeda motor.',
                'materi' => 'Servis Sepeda Motor, Sistem Injeksi, Manajemen Bengkel, Penjualan Otomotif',
                'karier' => 'Mekanik sepeda motor, Teknisi dealer, Sales otomotif, Pemilik bengkel motor',
            ],
        ]);
    }
}