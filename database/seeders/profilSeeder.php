<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class profilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('profil')->insert([
            'namaSekolah'   
                => 'SMK YPC Tasikmalaya',
            'kepalaSekolah' 
                => 'Drs. Ujang Sanusi MM.',
            'fotoKepala'
                => 'infomasi/kepala.jpg',
            'sambutan' 
            => "Puji syukur ke hadirat Tuhan YME atas segala rahmat dan karunia-Nya. Selamat datang di website resmi sekolah kami.\n\nWebsite ini kami hadirkan sebagai sarana informasi dan komunikasi antara sekolah dengan orang tua, peserta didik, serta masyarakat luas.\n\nDengan harapan seluruh informasi mengenai kegiatan, prestasi, serta program pendidikan dapat tersampaikan secara transparan, cepat, dan akurat.",
            'fotoSekolah'          
                => 'profil/foto/sample.jpg',
            'logoSekolah'          
                => 'profil/logo/ypc.png',
            'npsn'          
                => '31890',
            'alamat'        
                => 'Jl. Garut - Tasikmalaya, Cikunten, Kec. Singaparna, 
                    Kabupaten Tasikmalaya, Jawa Barat 46414, Indonesia',
            'kontak'        
                => '0265546717',
            'visi'      
                => 'Menjadi SMK yang unggul dalam prestasi, didasari IMTAK, dihiasi Akhlakul Karimah, 
                    dan dibekali dengan IPTEK serta mampu bersaing pada tingkat Nasional dan Global.',
            'misi'      
                => 'Menumbuhkan semangat keunggulan dan kompetitif secara intensif kepada seluruh warga sekolah. Mewujudkan lingkungan pendidikan yang kondusif, penuh kreativitas, kerjasama, dan dinamika dengan penonjolan prestasi tinggi. Menyelenggarakan pendidikan yang aktif, efektif, efisien, berkualitas, permeabel, dan fleksibel yang berorientasi pada pencapaian kompetensi berstandar Nasional dan Internasional. Menghasilkan tenaga kerja profesional di bidang teknologi untuk memenuhi tuntutan dunia usaha dan industri serta mengintensifkan hubungan dengan Dunia Usaha/Dunia Industri yang memiliki reputasi Nasional dan Internasional. Membekali peserta didik untuk mampu mengembangkan diri.',
            'tahunBerdiri'  
                => '1997',
            'deskripsi'
                => 'Sekolah kami merupakan institusi pendidikan yang berkomitmen untuk menciptakan generasi unggul, berkarakter, dan siap menghadapi tantangan masa depan. 
                    Dengan mengedepankan kualitas pendidikan yang seimbang antara akademik dan keterampilan praktis, kami hadir sebagai solusi pendidikan modern yang relevan dengan perkembangan zaman.
                    Didirikan dengan visi untuk menjadi sekolah yang inovatif dan berdaya saing, kami terus berupaya menghadirkan lingkungan belajar yang inspiratif, nyaman, dan mendukung perkembangan potensi setiap siswa. 
                    Kami percaya bahwa setiap siswa memiliki keunikan dan potensi yang dapat dikembangkan melalui pendekatan pendidikan yang tepat.',
            'sejarah'     
                => 'SMK YPC Tasikmalaya didirikan pada 9 Juni 1997 di bawah naungan Yayasan Pesantren Cintawana untuk memadukan pendidikan kejuruan modern dengan nilai-nilai agama. 
                    Pada awal berdiri, sekolah vokasi ini hanya membuka dua program keahlian, yaitu Elektronika Komunikasi dan Mekanik Otomotif. 
                    Perkembangan besar terjadi saat sekolah mendapatkan bantuan dari Islamic Development Bank (IDB) pada tahun 1999 yang mempercepat pembangunan fasilitas gedung dan pengadaan alat praktik.
                    Saat ini, sekolah tersebut telah berkembang pesat menjadi salah satu SMK unggulan berakreditasi A di wilayah Singaparna, Tasikmalaya. 
                    Dengan memadukan kurikulum industri dan lingkungan pesantren tradisional, SMK YPC sukses mencetak ribuan lulusan yang kompeten di bidang teknologi sekaligus memiliki karakter akhlakul karimah.',
        ]);
    }
}
