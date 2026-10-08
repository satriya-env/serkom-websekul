@extends('public.temp')

@section('title', 'SMK YPC Tasikmalaya')

@push('style')
<style>
    /* SLIDER */
        :root { --nav-h: 80px; } /* sesuaikan dengan tinggi navbar Anda */

        #slide { margin: 0; padding: 0; width: 100%; }
        #slide .carousel-inner { width: 100%; }
        .carousel-item { position: relative; }
        .carousel-item::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.8));
            pointer-events: none;
        }
        .carousel-item img {
            display: block;
            width: 100%;
            height: 700px;
            object-fit: cover;
        }
        .carousel-caption {
            top: 0;
            bottom: 0;
            left: 8%;
            right: 8%;
            z-index: 2;
            text-align: left;
            padding-top: calc(var(--nav-h) + 20px);
            padding-bottom: 50px;
        }
        .caption-inner { max-width: 480px; }
        .caption-inner h1 { font-size: clamp(1.5rem, 4vw, 2.5rem); }
        .carousel-control-prev, .carousel-control-next { z-index: 3; }

        @media (max-width: 991.98px) {
            .carousel-item img { height: 560px; }
        }
        @media (max-width: 767.98px) {
            .caption-inner { max-width: 100%; }
        }
        @media (max-width: 575.98px) {
            :root { --nav-h: 64px; } 
            .carousel-item img { height: 520px; }
            .carousel-caption {
                left: 6%;
                right: 6%;
                padding-bottom: 40px;
            }
            .caption-inner span { font-size: .9rem; }
            a.carousel-control-next, a.carousel-control-prev{
                display: none;
                visibility: hidden
            }
        }

    /* SAMBUTAN */
        .sambutan-img {
            height: 100%;
            min-height: 260px;
            object-fit: cover;
        }
        @media (max-width: 767.98px) {
            .sambutan-img { height: 300px; }
            .sambutan-body { text-align: center; }
        }

        #cardsambutan{
            transition: transform .2s ease, box-shadow .3s ease;
        }
        #cardsambutan:hover{
            transform: scale(1.01);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .2);
        }

    /* PROFIL */
        .profil-section {
            position: relative;
            width: 100%;
            margin: 0;
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        /* overlay agar teks tetap terbaca di layar kecil */
        .profil-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.25);
        }
        .profil-section > .container { position: relative; z-index: 1; }

        @media (max-width: 575.98px) {
            .profil-section .btn { width: 100%; }
        }

    /* KEUNGGULAN */
        .feature-card {
            border: 1px solid transparent;
            border-bottom: 4px solid transparent;
            border-radius: 12px;
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);
        }

        .feature-card .feature-icon {
            transition: transform .4s ease, box-shadow .3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .2);
        }

        .feature-card h5 {
            transition: color .3s ease;
        }

        .feature-card:hover h5 {
            /* color: #007bff !important; */
        }

    /* PARTNERSHIP */
        .partner-wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding-bottom: 3rem;
        }
        .mitra-logo {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            max-height: 64px;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: .6;
            transition: filter .3s ease, opacity .3s ease, transform .3s ease;
        }
        .mitra-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.08);
        }
        @media (max-width: 767.98px) {
            .partner-wrap { padding-bottom: 1.5rem; }
            .mitra-logo { max-height: 48px; }
        }

    /* JURUSAN - ESKUL */
        .program-wrap { position: relative; }

        .scroll-horizontal {
            overflow-x: auto;
            scroll-snap-type: x proximity;
            scrollbar-width: none;
            -ms-overflow-style: none;
            cursor: grab;
            user-select: none;
            -webkit-overflow-scrolling: touch;
        }
        .scroll-horizontal::-webkit-scrollbar { display: none; }
        .scroll-horizontal.is-dragging {
            cursor: grabbing;
            scroll-snap-type: none;
        }
        .scroll-horizontal > :first-child { margin-left: auto; }
        .scroll-horizontal > :last-child  { margin-right: auto; }

        .program-nav {
            position: absolute;
            opacity: 0;
            top: 40%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 50%;
            background: #fff;
            color: #4e73df;
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .25);
            z-index: 2;
            transition: opacity .25s ease;
        }
        .program-wrap:hover .program-nav { opacity: 1; }
        .program-nav.prev { left: -15px; }
        .program-nav.next { right: -15px; }

        .program-card {
            width: 270px;
            border-radius: 16px;
            box-shadow: 0 .25rem .9rem rgba(0, 0, 0, .15);
            scroll-snap-align: start;
        }
        .program-media {
            position: relative;
            background: #d9d9d9;
            border-radius: 16px 16px 0 0;
        }
        .program-media img {
            display: block;
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 16px 16px 0 0;
            pointer-events: none;
        }
        .program-badge {
            position: absolute;
            right: 16px;
            bottom: -28px;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #1c2a8c;
            color: #fff;
            font-size: 1.3rem;
            box-shadow: 0 .25rem .6rem rgba(0, 0, 0, .25);
        }
        .program-card .card-body { padding: 2rem 1.1rem 1.25rem; }
        .program-title { font-size: 1rem; line-height: 1.35; }
        .program-desc {
            font-size: .85rem;
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 575.98px) {
            .program-card { width: 240px; }
            .program-nav { display: none; }
            .jurusan-img{display: none;}
            #btn-jurusan{ margin-bottom: 10%;}
        }

    /* BERITA  */
        .berita-card {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 .25rem .9rem rgba(0, 0, 0, .12);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .berita-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 .5rem 1.25rem rgba(0, 0, 0, .18);
        }
        .berita-card img { height: 200px; object-fit: cover; }
        .berita-card .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
</style>
@endpush

@section('content')
    {{-- SLIDE IMAGE --}}
    <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            {{-- ITEM 1 --}}
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/banner/1.png') }}" alt="Banner 1">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="caption-inner mx-0 mx-md-5">
                        <span class="text-warning font-weight-bold">SEKOLAH UNGGULAN</span>
                        <h1 class="font-weight-bold">Membangun Generasi Emas</h1>
                        <span>Lingkungan belajar modern dengan tenaga pendidik profesional dan program terarah untuk membentuk karakter, kompetensi, dan kesiapan karier siswa.</span>
                    </div>
                </div>
            </div>

            {{-- ITEM 2 --}}
            <div class="carousel-item">
                <img src="{{ asset('assets/img/banner/2.jpg') }}" alt="Banner 2">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="caption-inner mx-0 mx-md-5">
                        <span class="text-warning font-weight-bold">BELAJAR & BERKARYA</span>
                        <h1 class="font-weight-bold">Tempat Tumbuh Bakat dan Prestasi</h1>
                        <span>Kami menghadirkan pendidikan berkualitas yang mengembangkan akademik, keterampilan, dan nilai karakter untuk masa depan yang lebih cerah.</span>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Berikutnya</span>
        </a>
    </div>

    {{-- SAMBUTAN KEPALA SEKOLAH --}}
    <div class="container py-5 my-lg-4">
        <div class="mx-auto" style="max-width: 1000px;">
            <div class="card overflow-hidden" id="cardsambutan">
                <div class="row no-gutters align-items-stretch">
                    <div class="col-md-4 col-12 bg-light">
                        <img src="{{ asset('storage/informasi/kepala.jpg') }}" alt="Foto Kepala Sekolah" class="sambutan-img w-100">
                    </div>

                    <div class="col-md-8 col-12 d-flex">
                        <div class="card-body p-4 sambutan-body">
                            <span class="text-warning font-weight-bold d-block mb-1">KOMITMEN KAMI UNTUK PENDIDIKAN</span>
                            <h2 class="card-title text-primary font-weight-bold h4">Sambutan dari Kepala Sekolah</h2>
                            <div class="card-text">
                                @php
                                    $teks = explode(' ', $profil->sambutan);
                                    $awal = implode(' ', array_slice($teks, 0, 18));
                                    $lanjutan = implode(' ', array_slice($teks, 18));
                                @endphp
                                <p>{{ $awal }}.</p>
                                <p>{{ $lanjutan }}</p>
                                <span class="font-weight-bold">{{ $profil->kepalaSekolah }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- PROFIL SEKOLAH --}}
    <div class="profil-section py-5" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <span class="text-warning font-weight-bold d-block mb-2">PROFIL SEKOLAH</span>
                    <h2 class="font-weight-bold mb-4">Selamat Datang di SMK YPC Tasikmalaya!</h2>
                    @php
                        $text = explode(' ', $profil->deskripsi);  
                        $top = implode(' ', array_slice($text, 0, 39));
                        $bot = implode(' ', array_slice($text, 39));
                    @endphp
                    <p> {{ $top }}. </p>
                    <p> {{ $bot }} </p>

                    <a href="{{route('public.profil')}}" class="btn btn-primary">
                        Baca selengkapnya
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{--  KEUNGGULAN  --}}
    <div class="container py-5 my-lg-4">
        <div class="text-center">
            <span class="text-warning">KEUNGGULAN KAMI</span>
            <h3 class="font-weight-bold text-primary">Mengapa Kami Menjadi Pilihan?</h3>
        </div>

        <div class="row mt-4 justify-content-center">
            {{-- Card 1 --}}
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card feature-card h-100 d-flex flex-column align-items-center text-center p-4">
                    <div class="feature-icon d-flex align-items-center justify-content-center bg-gradient-primary text-light rounded my-3" style="width: 100px; height: 100px;">
                        <i class="fa fa-book-open" style="font-size: 40px;"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-2">Kurikulum Berbasis Industri</h5>
                    <p class="mb-0">Pembelajaran disusun sesuai kebutuhan dunia kerja sehingga siswa memiliki kompetensi yang relevan dan siap digunakan di industri.</p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card feature-card h-100 d-flex flex-column align-items-center text-center p-4">
                    <div class="feature-icon d-flex align-items-center justify-content-center bg-gradient-primary text-light rounded my-3" style="width: 100px; height: 100px;">
                        <i class="fa fa-microscope" style="font-size: 40px;"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-2">Fasilitas Praktik Modern</h5>
                    <p class="mb-0">Didukung laboratorium dan peralatan praktik yang lengkap untuk menunjang pembelajaran berbasis keterampilan nyata.</p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card feature-card h-100 d-flex flex-column align-items-center text-center p-4">
                    <div class="feature-icon d-flex align-items-center justify-content-center bg-gradient-primary text-light rounded my-3" style="width: 100px; height: 100px;">
                        <i class="fa fa-chalkboard-teacher" style="font-size: 40px;"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-2">Tenaga Pengajar Kompeten</h5>
                    <p class="mb-0">Guru berpengalaman dan kompeten di bidangnya, siap membimbing siswa dengan pendekatan pembelajaran yang efektif.</p>
                </div>
            </div>
        </div>
    </div>

    {{--  PARTNERSHIP --}}
    <div class="container-fluid my-5" style="background: #f5f5f5">
        <div class="text-center mb-lg-4 pt-5">
            <span class="text-warning">REKAN KAMI</span>
            <h3 class="text-primary font-weight-bold">Kami Bekerja Sama dengan</h3>
        </div>
        @php
            $files = glob(public_path('assets/img/partner/*.{png,jpg,jpeg,webp,svg}'), GLOB_BRACE);
        @endphp

        <div class="partner-wrap px-3">
            <div class="row mt-3 justify-content-center align-items-center text-center">
                @foreach ($files as $file)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <img src="{{ asset('assets/img/partner/' . basename($file)) }}"
                             alt="{{ pathinfo($file, PATHINFO_FILENAME) }}"
                             class="mitra-logo">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- JURUSAN --}}
    @php
        $jurusan = [
            [
                'nama' => 'Bisnis Digital (BD)',
                'deskripsi' => 'Mempelajari pemasaran digital, e-commerce, dan pengelolaan usaha berbasis teknologi.',
                'icon' => 'fa-chart-line',
                'gambar' => asset('assets/img/jurusan/bd.jpg'),
            ],
            [
                'nama' => 'Desain Komunikasi Visual (DKV)',
                'deskripsi' => 'Mengembangkan kemampuan desain grafis, ilustrasi, fotografi, dan produksi konten visual.',
                'icon' => 'fa-palette',
                'gambar' => asset('assets/img/jurusan/dkv.jpeg'),
            ],
            [
                'nama' => 'Teknik Komputer dan Jaringan (TKJ)',
                'deskripsi' => 'Mempelajari instalasi, konfigurasi, dan pengamanan jaringan komputer serta telekomunikasi.',
                'icon' => 'fa-network-wired',
                'gambar' => asset('assets/img/jurusan/tkj.png'),
            ],
            [
                'nama' => 'Rekayasa Perangkat Lunak (RPL)',
                'deskripsi' => 'Mempelajari pemrograman, pengembangan aplikasi web, mobile, dan pengelolaan basis data.',
                'icon' => 'fa-laptop-code',
                'gambar' => asset('assets/img/jurusan/rpl.png'),
            ],
            [
                'nama' => 'Teknik Elektronika Industri (TEKLIN)',
                'deskripsi' => 'Mempelajari rangkaian elektronika, sistem kontrol, otomasi, dan perawatan peralatan elektronik industri.',
                'icon' => 'fa-microchip',
                'gambar' => asset('assets/img/jurusan/teklin.png'),
            ],
            [
                'nama' => 'Desain Pemodelan dan Informasi Bangunan (DPIB)',
                'deskripsi' => 'Mempelajari gambar teknik, pemodelan 3D, dan perencanaan bangunan menggunakan perangkat lunak desain.',
                'icon' => 'fa-drafting-compass',
                'gambar' => asset('assets/img/jurusan/dpib.png'),
            ],
            [
                'nama' => 'Teknik Kendaraan Ringan (TKR)',
                'deskripsi' => 'Mempelajari perawatan, perbaikan, dan diagnosis mesin serta sistem kelistrikan kendaraan ringan.',
                'icon' => 'fa-car',
                'gambar' => asset('assets/img/jurusan/tkr.png'),
            ],
            [
                'nama' => 'Teknik Bisnis Sepeda Motor (TBSM)',
                'deskripsi' => 'Mempelajari servis sepeda motor serta pengelolaan bisnis bengkel dan penjualan sepeda motor.',
                'icon' => 'fa-motorcycle',
                'gambar' => asset('assets/img/jurusan/tbsm.png'),
            ],
        ];
    @endphp
        {{-- PENGANTAR --}}
    <div class="container pt-5">
        <div class="m-0">
            <div class="row">
                <img src="{{ asset('assets/img/jurusan.png')}}" style="height: 250px" class="jurusan-img">
                <div class="col">
                    <span class="font-weight-bold text-warning">PILIHAN KOMPETENSI</span>
                    <h3 class="font-weight-bold text-primary">Program Keahlian</h3>
                    <p class="">
                        Kami menghadirkan program keahlian berbasis industri yang dirancang untuk mencetak lulusan kompeten, siap kerja, dan adaptif di era digital. 
                        Pembelajaran difokuskan pada praktik, teknologi terkini, serta penguatan keterampilan profesional.
                    </p>
                    <a href="{{route('public.jurusan')}}">
                        <div class="btn btn-primary" id="btn-jurusan">
                            Lihat Semua
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
        {{-- SLIDER --}}
    <div class="container-fluid py-5 m-0" style="background: #f5f5f5">
        <div class="container">
            <div class="program-wrap">
                <button type="button" class="program-nav prev" aria-label="Sebelumnya">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div id="programScroll" class="d-flex flex-nowrap scroll-horizontal pt-2 pb-4 px-1">
                    @foreach ($jurusan as $item)
                        <div class="card program-card flex-shrink-0 border-0 {{ $loop->last ? '' : 'mr-3' }}">
                            <div class="program-media">
                                <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}">
                                <span class="program-badge">
                                    <i class="fas {{ $item['icon'] }}"></i>
                                </span>
                            </div>
                            <div class="card-body">
                                <h6 class="program-title font-weight-bold text-dark">{{ $item['nama'] }}</h6>
                                <p class="program-desc mb-0">{{ $item['deskripsi'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" class="program-nav next" aria-label="Berikutnya">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
        
    {{-- ESKUL --}}
    <div class="container py-5">
        <div class="text-center mb-5">
            <h3 class="font-weight-bold text-primary">Ekstrakurikuler</h3>
            <span class="mb-5">Temukan Bakat dan Minatmu bersama kami</span>
        </div>

        <div class="program-wrap">
            <button type="button" class="program-nav prev" aria-label="Sebelumnya">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div id="eskulScroll" class="d-flex flex-nowrap scroll-horizontal pt-2 pb-4 px-1">
                @forelse ($eskul as $item)
                    <div class="card program-card flex-shrink-0 border-0 {{ $loop->last ? '' : 'mr-3' }}">
                        <div class="program-media">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->namaEskul }}">
                        </div>
                        <div class="card-body">
                            <h6 class="program-title font-weight-bold text-dark">{{ $item->namaEskul }}</h6>
                            <p class="program-desc mb-2">{{ $item->deskripsi }}</p>
                            <small class="text-muted d-block">
                                <i class="fas fa-calendar-alt"></i> {{ $item->jadwalLatihan }}
                            </small>
                            <small class="text-muted d-block">
                                <i class="fas fa-user"></i> {{ $item->guru?->nama ?? $item->pembina }}
                            </small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mx-auto">Belum ada data ekstrakurikuler.</p>
                @endforelse
            </div>

            <button type="button" class="program-nav next" aria-label="Berikutnya">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    {{-- BERITA --}}
    <div class="container pb-5 mb-lg-4">
        <div class="text-center mb-5">
            <h3 class="font-weight-bold text-primary">Berita dan Artikel</h3>
            <span>Berita terbaru terkait sekolah kami</span>
        </div>

        <div class="row justify-content-center">
            @forelse ($berita as $data)
                <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card berita-card h-100">
                        <img src="{{ asset('storage/' . $data->gambar) }}" class="card-img-top" alt="{{ $data->judul }}">
                        <div class="card-body p-4">
                            <span class="small">{{$data->tanggal}}</span>
                            <h5 class="card-title font-weight-bold">{{ $data->judul }}</h5>
                            <p class="card-text text-muted text-break">{{ $data->isi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">
                    Belum ada berita.
                </div>
            @endforelse
        </div>
    </div>

@endsection

@push('script')
<script>
    (function () {
        document.querySelectorAll('.program-wrap').forEach(function (wrap) {
            const slider = wrap.querySelector('.scroll-horizontal');
            const prev   = wrap.querySelector('.program-nav.prev');
            const next   = wrap.querySelector('.program-nav.next');
            if (!slider) return;

            let isDown = false, startX = 0, startScroll = 0;

            // Drag dengan mouse
            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('is-dragging');
                startX = e.pageX;
                startScroll = slider.scrollLeft;
            });
            window.addEventListener('mouseup', () => {
                if (!isDown) return;
                isDown = false;
                slider.classList.remove('is-dragging');
            });
            window.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                slider.scrollLeft = startScroll - (e.pageX - startX);
            });

            // Tombol panah: geser selebar satu kartu
            const step = () => {
                const card = slider.querySelector('.program-card');
                return card ? card.offsetWidth + 16 : 300;
            };
            if (prev) prev.addEventListener('click', () => {
                slider.scrollBy({ left: -step(), behavior: 'smooth' });
            });
            if (next) next.addEventListener('click', () => {
                slider.scrollBy({ left: step(), behavior: 'smooth' });
            });
        });
    })();
</script>
@endpush