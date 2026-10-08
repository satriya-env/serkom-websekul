@extends('public.temp')

@section('title', 'Jurusan - SMK YPC Tasikmalaya')

@push('style')
<style>
    :root {
        --accent: #ffc107;
        --section-bg: #f5f5f5;
    }

    /* HEADER HALAMAN */
        .page-header {
            position: relative;
            padding: 170px 0 80px;
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .page-header::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25));
        }
        .page-header > .container { position: relative; z-index: 1; }
        .page-header h1 { font-size: clamp(1.75rem, 5vw, 2.75rem); }
        .page-header .breadcrumb { background: transparent; padding: 0; margin: 0; }
        .page-header .breadcrumb a,
        .page-header .breadcrumb-item.active,
        .page-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.85); }

    /* UTILITAS */
        .section-gray { background: var(--section-bg); }
        .jurusan-anchor { scroll-margin-top: 90px; }

    /* NAVIGASI CEPAT */
        .quick-nav { gap: .5rem; }
        .quick-nav a {
            display: inline-flex;
            align-items: center;
            padding: .4rem 1rem;
            border-radius: 50px;
            background: #fff;
            color: #4e73df;
            font-size: .85rem;
            font-weight: 600;
            box-shadow: 0 .15rem .5rem rgba(0,0,0,.1);
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }
        .quick-nav a:hover {
            background: #4e73df;
            color: #fff;
            text-decoration: none;
            transform: translateY(-2px);
        }
        .quick-nav img {
            height: 22px;
            width: auto;
            margin-right: .5rem;
            object-fit: contain;
        }

    /* DETAIL JURUSAN */
        .jurusan-img {
            display: block;
            width: 100%;
            height: 340px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.15);
            background: #d9d9d9;
        }
        .chip {
            display: inline-block;
            margin: 0 .35rem .5rem 0;
            padding: .25rem .8rem;
            border-radius: 50px;
            background: rgba(78,115,223,.1);
            color: #4e73df;
            font-size: .82rem;
            font-weight: 600;
        }
        .karier-list { list-style: none; padding-left: 0; margin-bottom: 0; }
        .karier-list li { position: relative; padding-left: 1.5rem; margin-bottom: .3rem; }
        .karier-list li::before {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: 0;
            color: #28a745;
            font-size: .8rem;
        }

        @media (max-width: 767.98px) {
            .jurusan-body { text-align: center; }
            .karier-list { text-align: left; display: inline-block; }
            .jurusan-img { height: 260px; }
            #text-jurusan { text-align: start}
        }
        @media (max-width: 575.98px) {
            .page-header { padding: 130px 0 50px; }
            #text-jurusan { text-align: start}
            
        }
</style>
@endpush

@section('content')
    @php
        $jurusan = [
            [
                'id' => 'bd',
                'singkatan' => 'BD',
                'nama' => 'Bisnis Digital',
                'logo' => asset('assets/img/jurusan/logo/bd.png'),
                'gambar' => asset('assets/img/jurusan/bd.jpg'),
                'deskripsi' => 'Mempelajari pemasaran digital, e-commerce, dan pengelolaan usaha berbasis teknologi agar siswa siap berwirausaha maupun bekerja di perusahaan modern.',
                'kompetensi' => ['Digital Marketing', 'E-Commerce', 'Administrasi Bisnis', 'Manajemen Usaha'],
                'karier' => ['Digital marketer', 'Admin toko online', 'Wirausahawan', 'Staf pemasaran dan penjualan'],
            ],
            [
                'id' => 'dkv',
                'singkatan' => 'DKV',
                'nama' => 'Desain Komunikasi Visual',
                'logo' => asset('assets/img/jurusan/logo/dkv.png'),
                'gambar' => asset('assets/img/jurusan/dkv.jpeg'),
                'deskripsi' => 'Mengembangkan kemampuan desain grafis, ilustrasi, fotografi, dan produksi konten visual untuk kebutuhan media cetak maupun digital.',
                'kompetensi' => ['Desain Grafis', 'Ilustrasi', 'Fotografi', 'Videografi'],
                'karier' => ['Desainer grafis', 'Content creator', 'Fotografer / videografer', 'Staf percetakan dan periklanan'],
            ],
            [
                'id' => 'tkj',
                'singkatan' => 'TKJ',
                'nama' => 'Teknik Komputer dan Jaringan',
                'logo' => asset('assets/img/jurusan/logo/tkj.png'),
                'gambar' => asset('assets/img/jurusan/tkj.png'),
                'deskripsi' => 'Mempelajari instalasi, konfigurasi, dan pengamanan jaringan komputer serta telekomunikasi.',
                'kompetensi' => ['Jaringan Komputer', 'Administrasi Server', 'Keamanan Jaringan', 'Perakitan PC'],
                'karier' => ['Teknisi jaringan', 'Network administrator', 'Teknisi ISP', 'IT support'],
            ],
            [
                'id' => 'rpl',
                'singkatan' => 'RPL',
                'nama' => 'Rekayasa Perangkat Lunak',
                'logo' => asset('assets/img/jurusan/logo/rpl.png'),
                'gambar' => asset('assets/img/jurusan/rpl.png'),
                'deskripsi' => 'Mempelajari pemrograman, pengembangan aplikasi web dan mobile, serta pengelolaan basis data.',
                'kompetensi' => ['Pemrograman Web', 'Aplikasi Mobile', 'Basis Data', 'UI/UX Dasar'],
                'karier' => ['Web developer', 'Mobile developer', 'Programmer'],
            ],
            [
                'id' => 'teklin',
                'singkatan' => 'TEKLIN',
                'nama' => 'Teknik Elektronika Industri',
                'logo' => asset('assets/img/jurusan/logo/teklin.png'),
                'gambar' => asset('assets/img/jurusan/teklin.png'),
                'deskripsi' => 'Mempelajari rangkaian elektronika, sistem kontrol, otomasi, dan perawatan peralatan elektronik industri.',
                'kompetensi' => ['Rangkaian Elektronika', 'PLC dan Otomasi', 'Sistem Kontrol', 'Instrumentasi'],
                'karier' => ['Teknisi elektronika', 'Operator mesin otomasi', 'Teknisi maintenance pabrik', 'Teknisi servis elektronik'],
            ],
            [
                'id' => 'dpib',
                'singkatan' => 'DPIB',
                'nama' => 'Desain Pemodelan dan Informasi Bangunan',
                'logo' => asset('assets/img/jurusan/logo/dpib.png'),
                'gambar' => asset('assets/img/jurusan/dpib.png'),
                'deskripsi' => 'Mempelajari gambar teknik, pemodelan 3D, dan perencanaan bangunan menggunakan perangkat lunak desain.',
                'kompetensi' => ['Gambar Teknik', 'AutoCAD', 'Pemodelan 3D', 'Estimasi Biaya Bangunan'],
                'karier' => ['Drafter', 'Juru gambar arsitektur', 'Pengawas lapangan', 'Estimator konstruksi'],
            ],
            [
                'id' => 'tkr',
                'singkatan' => 'TKR',
                'nama' => 'Teknik Kendaraan Ringan',
                'logo' => asset('assets/img/jurusan/logo/tkr.png'),
                'gambar' => asset('assets/img/jurusan/tkr.png'),
                'deskripsi' => 'Mempelajari perawatan, perbaikan, dan diagnosis mesin serta sistem kelistrikan kendaraan ringan.',
                'kompetensi' => ['Servis Mesin', 'Kelistrikan Otomotif', 'Chassis dan Pemindah Tenaga', 'Diagnosis Kendaraan'],
                'karier' => ['Mekanik bengkel', 'Teknisi dealer resmi', 'Service advisor', 'Pemilik bengkel'],
            ],
            [
                'id' => 'tbsm',
                'singkatan' => 'TBSM',
                'nama' => 'Teknik Bisnis Sepeda Motor',
                'logo' => asset('assets/img/jurusan/logo/tbsm.png'),
                'gambar' => asset('assets/img/jurusan/tbsm.png'),
                'deskripsi' => 'Mempelajari servis sepeda motor serta pengelolaan bisnis bengkel dan penjualan sepeda motor.',
                'kompetensi' => ['Servis Sepeda Motor', 'Sistem Injeksi', 'Manajemen Bengkel', 'Penjualan Otomotif'],
                'karier' => ['Mekanik sepeda motor', 'Teknisi dealer', 'Sales otomotif', 'Pemilik bengkel motor'],
            ],
        ];
    @endphp

    {{-- HEADER --}}
    <div class="page-header" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container">
            <span class="small font-weight-bold text-warning d-block">PROGRAM KEAHLIAN</span>
            <h1 class="font-weight-bold mb-3">Jurusan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Jurusan</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- PENGANTAR + NAVIGASI CEPAT --}}
    <div class="container-fluid py-5 section-gray">
        <div class="container text-center">
            <h3 class="font-weight-bold text-primary">Program Keahlian di SMK YPC Tasikmalaya</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Setiap program keahlian dirancang dengan kurikulum berbasis industri, fasilitas praktik yang memadai,
                dan pembinaan karakter agar lulusan siap bekerja, melanjutkan studi, maupun berwirausaha.
            </p>

            <div class="quick-nav d-flex flex-wrap justify-content-center">
                @foreach ($jurusan as $item)
                    <a href="#{{ $item['id'] }}">
                        {{ $item['singkatan'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- DETAIL JURUSAN --}}
    @foreach ($jurusan as $item)
        <div id="{{ $item['id'] }}" class="jurusan-anchor {{ $loop->even ? 'section-gray' : '' }}">
            <div class="container py-5 my-lg-4">
                <div class="row align-items-center">
                    {{-- Gambar --}}
                    <div class="col-md-5 mb-4 mb-md-0 {{ $loop->even ? 'order-md-2' : '' }}">
                        <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" class="jurusan-img" loading="lazy">
                    </div>

                    {{-- Teks --}}
                    <div class="col-md-7 jurusan-body {{ $loop->even ? 'pr-md-5 order-md-1' : 'pl-md-5' }}">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ $item['logo'] }}" alt="{{ $item['nama'] }}" onerror="this.style.display='none'" style="height: 100px;">
                            </div>
                            <div class="col text-start" id="text-jurusan">
                                <span class="text-warning font-weight-bold d-block">{{ $item['singkatan'] }}</span>
                                <span class="text-primary font-weight-bold h3">{{ $item['nama'] }}</span>
                            </div>
                        </div>
                        <p>{{ $item['deskripsi'] }}</p>

                        <h6 class="font-weight-bold text-dark mt-4 mb-2">Kompetensi yang Dipelajari</h6>
                        <div class="mb-3">
                            @foreach ($item['kompetensi'] as $k)
                                <span class="chip">{{ $k }}</span>
                            @endforeach
                        </div>

                        <h6 class="font-weight-bold text-dark mb-2">Prospek Karier</h6>
                        <ul class="karier-list">
                            @foreach ($item['karier'] as $k)
                                <li>{{ $k }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection