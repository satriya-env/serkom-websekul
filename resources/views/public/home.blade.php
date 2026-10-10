@extends('public.temp')

@section('title', 'SMK YPC Tasikmalaya')

@push('style')
<style>
    :root{
        --bg-primary: #1a2b88; 
        --bg-biru: #2653d4; 
    }
    #cardSambutan{
        transition: .25s;
    }
    #cardSambutan:hover{
        scale: 1.02;
    }
    #cardUnggul{
        transition: .25s;   
    }
    #cardUnggul:hover{
        scale: 1.07;   
    }
    #cardUnggul div{
        background-color: var(--bg-primary);
        transition: .25s; 
    }
    #cardUnggul:hover div{
        background-color: var(--bg-biru);
    }
    .program-wrap .program-nav {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .program-wrap:hover .program-nav {
        opacity: 1;
        visibility: visible;
    }

    #imgLogo img{
        max-height:64px; 
        object-fit:contain; 
        filter:grayscale(100%); 
        opacity:.6;
        transition: .25s
    }
    #imgLogo:hover img{
        max-height:64px; 
        filter: none;
        opacity: 1;
        scale: 1.1;
    }

    #cardBerita{
        border-radius: 5%;
        transition: .25s;
    }
    #cardBerita:hover{
        scale: 1.02;
    }

    #statItem{
        transition: .25s ease;
    }
    #statItem:hover{
        scale: 1.2;
        cursor: default;
    }
</style>    
@endpush

@section('content')
    {{-- SLIDE IMAGE --}}
    <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            {{-- ITEM 1 --}}
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/banner/1.png') }}" alt="Banner 1" class="d-block w-100" style="height:560px; object-fit:cover;">
                <div class="position-absolute w-100 h-100 bg-dark" style="top:0; left:0; opacity:.7;"></div>
                <div class="carousel-caption d-flex align-items-center text-left pt-5 pb-5" style="top:0; bottom:0; left:8%; right:8%;">
                    <div class="mx-0 mx-md-5" style="max-width:480px;">
                        <span class="text-warning font-weight-bold">SEKOLAH UNGGULAN</span>
                        <h1 class="h2 font-weight-bold">Membangun Generasi Emas</h1>
                        <span>Lingkungan belajar modern dengan tenaga pendidik profesional dan program terarah untuk membentuk karakter, kompetensi, dan kesiapan karier siswa.</span>
                        <div>
                            <a href="{{ route('public.jurusan') }}" class="btn btn-warning text-white mt-3">
                                <span>Lihat Program Kami</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ITEM 2 --}}
            <div class="carousel-item">
                <img src="{{ asset('assets/img/banner/2.jpg') }}" alt="Banner 2" class="d-block w-100" style="height:560px; object-fit:cover;">
                <div class="position-absolute w-100 h-100 bg-dark" style="top:0; left:0; opacity:.7;"></div>
                <div class="carousel-caption d-flex align-items-center text-left pt-5 pb-5" style="top:0; bottom:0; left:8%; right:8%;">
                    <div class="mx-0 mx-md-5" style="max-width:480px;">
                        <span class="text-warning font-weight-bold">BELAJAR & BERKARYA</span>
                        <h1 class="h2 font-weight-bold">Tempat Tumbuh Bakat dan Prestasi</h1>
                        <span>Kami menghadirkan pendidikan berkualitas yang mengembangkan akademik, keterampilan, dan nilai karakter untuk masa depan yang lebih cerah.</span>
                        <div>
                            <a href="{{ route('public.jurusan') }}" class="btn btn-warning text-white mt-3">
                                <i class="fas fa-chevron-right mr-1"></i> LIHAT PROGRAM KAMI
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev d-none d-sm-flex" href="#slide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next d-none d-sm-flex" href="#slide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Berikutnya</span>
        </a>
    </div>

    {{-- STATISTIK --}}
    <div class="container position-relative mt-n5" style="z-index:5;">
        <div class="row no-gutters bg-gradient-primary text-white text-center shadow-lg overflow-hidden" style="border-radius:16px;">
            <div class="col-4 col-md py-3 py-md-4" id="statItem">
                <div class="h2 font-weight-bold mb-0">A</div>
                <div class="small">Akreditasi</div>
            </div>
            <hr class="text-white">
            <div class="col-4 col-md py-3 py-md-4" id="statItem">
                <div class="h2 font-weight-bold mb-0">1300+</div>
                <div class="small">Siswa</div>
            </div>
            <div class="col-4 col-md py-3 py-md-4" id="statItem">
                <div class="h2 font-weight-bold mb-0">100+</div>
                <div class="small">Guru & Staf</div>
            </div>
            <div class="col-6 col-md py-3 py-md-4" id="statItem">
                <div class="h2 font-weight-bold mb-0">{{ count($eskul) }}</div>
                <div class="small">Ekstrakurikuler</div>
            </div>
            <div class="col-6 col-md py-3 py-md-4" id="statItem">
                <div class="h2 font-weight-bold mb-0">{{ count($jurusan) }}</div>
                <div class="small">Jurusan</div>
            </div>
        </div>
    </div>

    {{-- SAMBUTAN KEPALA SEKOLAH --}}
    <div class="container py-5 my-lg-4">
        <div class="mx-auto" style="max-width:1000px;">
            <div class="card overflow-hidden shadow" id="cardSambutan">
                <div class="row no-gutters align-items-stretch">
                    <div class="col-md-4 col-12 bg-light">
                        <img src="{{ asset('storage/informasi/kepala.jpg') }}" alt="Foto Kepala Sekolah" class="w-100 h-100" style="object-fit:cover; min-height:260px;">
                    </div>

                    <div class="col-md-8 col-12 d-flex">
                        <div class="card-body p-4 text-center text-md-left">
                            <span class="text-warning font-weight-bold d-block mb-1">KOMITMEN KAMI UNTUK PENDIDIKAN</span>
                            <h2 class="card-title text-primary font-weight-bold h4">Sambutan dari Kepala Sekolah</h2>
                            <div class="card-text">
                                @php
                                    $teks = explode(' ', $profil->sambutan);
                                    $awal = implode(' ', array_slice($teks, 0, 18));
                                    $akhir = implode(' ', array_slice($teks, 18));
                                @endphp
                                <p>{{ $awal }}</p>
                                <p>{{ $akhir }}</p>
                                <span class="font-weight-bold">{{ $profil->kepalaSekolah }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- PROFIL SEKOLAH --}}
    <div class="position-relative w-100 text-white py-5" style="background-image:url('{{ asset('assets/img/banner.png') }}'); background-size:cover; background-position:center;">
        <div class="position-absolute w-100 h-100 bg-dark" style="top:0; left:0; opacity:.25;"></div>
        <div class="container position-relative py-4">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <span class="text-warning font-weight-bold d-block mb-2">PROFIL SEKOLAH</span>
                    <h2 class="font-weight-bold mb-4">Selamat Datang di SMK YPC Tasikmalaya!</h2>
                    @php
                        $text = explode(' ', $profil->deskripsi);
                        $top = implode(' ', array_slice($text, 0, 39));
                        $bot = implode(' ', array_slice($text, 39));
                    @endphp
                    <p>{{ $top }}.</p>
                    <p>{{ $bot }}</p>

                    <a href="{{ route('public.profil') }}" class="btn btn-primary">
                        Baca selengkapnya
                        <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- KEUNGGULAN --}}
    <div class="container py-5 my-lg-4">
        <div class="text-center">
            <span class="text-warning">KEUNGGULAN KAMI</span>
            <h3 class="font-weight-bold text-primary">Mengapa Kami Menjadi Pilihan?</h3>
        </div>

        <div class="row mt-4 justify-content-center">
            {{-- Card 1 --}}
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 d-flex flex-column align-items-center text-center p-4 rounded-lg" id="cardUnggul">
                    <div class="d-flex align-items-center justify-content-center text-light rounded shadow my-3" style="width:100px; height:100px;">
                        <i class="fa fa-book-open" style="font-size:40px;"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-2">Kurikulum Berbasis Industri</h5>
                    <p class="mb-0">Pembelajaran disusun sesuai kebutuhan dunia kerja sehingga siswa memiliki kompetensi yang relevan dan siap digunakan di industri.</p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 d-flex flex-column align-items-center text-center p-4 rounded-lg" id="cardUnggul">
                    <div class="d-flex align-items-center justify-content-center text-light rounded shadow my-3" style="width:100px; height:100px;">
                        <i class="fa fa-microscope" style="font-size:40px;"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-2">Fasilitas Praktik Modern</h5>
                    <p class="mb-0">Didukung laboratorium dan peralatan praktik yang lengkap untuk menunjang pembelajaran berbasis keterampilan nyata.</p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card shadow h-100 d-flex flex-column align-items-center text-center p-4 rounded-lg" id="cardUnggul">
                    <div class="d-flex align-items-center justify-content-center text-light rounded shadow my-3" style="width:100px; height:100px;">
                        <i class="fa fa-chalkboard-teacher" style="font-size:40px;"></i>
                    </div>
                    <h5 class="font-weight-bold text-dark mt-2">Tenaga Pengajar Kompeten</h5>
                    <p class="mb-0">Guru berpengalaman dan kompeten di bidangnya, siap membimbing siswa dengan pendekatan pembelajaran yang efektif.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- PARTNERSHIP --}}
    <div class="container-fluid my-5 bg-light">
        <div class="text-center mb-lg-4 pt-5">
            <span class="text-warning">REKAN KAMI</span>
            <h3 class="text-primary font-weight-bold">Kami Bekerja Sama dengan</h3>
        </div>
        @php
            $files = glob(public_path('assets/img/partner/*.{png,jpg,jpeg,webp,svg}'), GLOB_BRACE);
        @endphp

        <div class="container px-3 pb-3 pb-md-5">
            <div class="row mt-3 justify-content-center align-items-center text-center">
                @foreach ($files as $file)
                    <div class="col-6 col-md-4 col-lg-3 mb-4" id="imgLogo">
                        <img src="{{ asset('assets/img/partner/' . basename($file)) }}"
                            alt="{{ pathinfo($file, PATHINFO_FILENAME) }}"
                            class="img-fluid d-block mx-auto">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- DAFTAR GURU --}}
    <div class="container py-5">
        <div class="text-center mb-5">
            <span class="text-warning font-weight-bold">TENAGA PENDIDIK PROFESIONAL</span>
            <h3 class="font-weight-bold text-primary">Daftar Guru</h3>
        </div>

        <div class="program-wrap position-relative">
            <button type="button" class="program-nav prev btn btn-light text-white bg-gradient-primary rounded-circle shadow border-0 p-0 position-absolute d-none d-sm-block" style="top:40%; left:-15px; width:40px; height:40px; z-index:2;" aria-label="Sebelumnya">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div id="guruScroll" class="scroll-horizontal d-flex flex-nowrap overflow-hidden py-3 px-2">
                <div class="ml-auto"></div>
                @forelse ($guru as $item)
                    <div class="card flex-shrink-0 border-0 shadow-sm {{ $loop->last ? '' : 'mr-3' }}" style="width:270px; max-width:85vw; border-radius:16px;">
                        <div class="position-relative bg-secondary" style="border-radius:16px 16px 0 0;">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->namaGuru }}" class="d-block w-100" style="height:250px; object-fit:cover; border-radius:16px 16px 0 0; pointer-events:none;">
                        </div>
                        <div class="card-body">
                            <h6 class="font-weight-bold text-dark mb-1">{{ $item->namaGuru }}</h6>
                            <p class="small text-muted mb-0 overflow-hidden" style="display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical;">
                                {{ $item->mapel ?? $item->jabatan ?? '' }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mx-auto">Belum ada data guru.</p>
                @endforelse
                <div class="mr-auto"></div>
            </div>

            <button type="button" class="program-nav next btn btn-light text-white bg-gradient-primary rounded-circle shadow border-0 p-0 position-absolute d-none d-sm-block" style="top:40%; right:-15px; width:40px; height:40px; z-index:2;" aria-label="Berikutnya">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>

    {{-- JURUSAN --}}
    <div class="container pt-5">
        <div class="row">
            <img src="{{ asset('assets/img/jurusan.png') }}" style="height:250px;" class="d-none d-sm-block" alt="Jurusan">
            <div class="col">
                <span class="font-weight-bold text-warning">PILIHAN KOMPETENSI</span>
                <h3 class="font-weight-bold text-primary">Program Keahlian</h3>
                <p>
                    Kami menghadirkan program keahlian berbasis industri yang dirancang untuk mencetak lulusan kompeten, siap kerja, dan adaptif di era digital.
                    Pembelajaran difokuskan pada praktik, teknologi terkini, serta penguatan keterampilan profesional.
                </p>
                <a href="{{ route('public.jurusan') }}" class="btn btn-primary mb-5 mb-sm-0">
                    Lihat Semua
                </a>
            </div>
        </div>
    </div>

    {{-- SLIDER JURUSAN --}}
    <div class="container-fluid py-5 m-0 bg-light">
        <div class="container">
            <div class="program-wrap position-relative">
                <button type="button" class="program-nav prev btn btn-light text-white bg-gradient-primary rounded-circle shadow border-0 p-0 position-absolute d-none d-sm-block" style="top:40%; left:-15px; width:40px; height:40px; z-index:2;" aria-label="Sebelumnya">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Benerin padding & overflow di sini -->
                <div id="programScroll" class="scroll-horizontal d-flex flex-nowrap overflow-hidden py-3 px-2">
                    <div class="ml-auto"></div>
                    @forelse ($jurusan as $item)
                        <div class="card flex-shrink-0 border-0 shadow-sm {{ $loop->last ? '' : 'mr-3' }}" style="width:270px; max-width:85vw; border-radius:16px;">
                            <div class="position-relative bg-secondary" style="border-radius:16px 16px 0 0;">
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="d-block w-100" style="height:150px; object-fit:cover; border-radius:16px 16px 0 0; pointer-events:none;">
                                <span class="position-absolute d-flex align-items-center justify-content-center rounded-circle bg-white shadow-sm overflow-hidden" style="right:16px; bottom:-28px; width:65px; height:65px;">
                                    <img src="{{ asset('storage/' . $item->logo) }}" alt="Logo {{ $item->alias }}" class="img-fluid p-1" style="max-height:100%; object-fit:contain; pointer-events:none;">
                                </span>
                            </div>
                            <div class="card-body pt-5">
                                <h6 class="font-weight-bold text-dark">{{ $item->nama }} ({{ $item->alias }})</h6>
                                <p class="small text-muted mb-0 overflow-hidden" style="display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical;">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mx-auto">Belum ada data jurusan.</p>
                    @endforelse
                    <div class="mr-auto"></div>
                </div>

                <button type="button" class="program-nav next btn btn-light text-white bg-gradient-primary rounded-circle shadow border-0 p-0 position-absolute d-none d-sm-block" style="top:40%; right:-15px; width:40px; height:40px; z-index:2;" aria-label="Berikutnya">
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

        <div class="program-wrap position-relative">
            <button type="button" class="program-nav prev btn btn-light text-white bg-gradient-primary rounded-circle shadow border-0 p-0 position-absolute d-none d-sm-block" style="top:40%; left:-15px; width:40px; height:40px; z-index:2;" id="slideNext">
                <i class="fas fa-chevron-left"></i>
            </button>

            <!-- Benerin padding & overflow di sini -->
            <div id="eskulScroll" class="scroll-horizontal d-flex flex-nowrap overflow-hidden py-3 px-2">
                <div class="ml-auto"></div>
                @forelse ($eskul as $item)
                    <div class="card flex-shrink-0 border-0 shadow-sm {{ $loop->last ? '' : 'mr-3' }}" style="width:270px; max-width:85vw; border-radius:16px;">
                        <div class="position-relative bg-secondary" style="border-radius:16px 16px 0 0;">
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->namaEskul }}" class="d-block w-100" style="height:150px; object-fit:cover; border-radius:16px 16px 0 0; pointer-events:none;">
                        </div>
                        <div class="card-body">
                            <h6 class="font-weight-bold text-dark">{{ $item->namaEskul }}</h6>
                            <p class="small text-muted mb-2 overflow-hidden" style="display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical;">{{ $item->deskripsi }}</p>
                            <small class="text-muted d-block">
                                <i class="fas fa-calendar-alt mr-1"></i> {{ $item->jadwalLatihan }}
                            </small>
                            <small class="text-muted d-block">
                                <i class="fas fa-user mr-1"></i> {{ $item->guru->namaGuru }}
                            </small>
                        </div>
                    </div>
                @empty
                    <p class="text-muted mx-auto">Belum ada data ekstrakurikuler.</p>
                @endforelse
                <div class="mr-auto"></div>
            </div>

            <button type="button" class="program-nav next btn btn-light text-white bg-gradient-primary rounded-circle shadow border-0 p-0 position-absolute d-none d-sm-block" style="top:40%; right:-15px; width:40px; height:40px; z-index:2;" aria-label="Berikutnya">
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
                    <div class="card border-0 shadow h-100 overflow-hidden" id="cardBerita">
                        <img src="{{ asset('storage/' . $data->gambar) }}" class="card-img-top" alt="{{ $data->judul }}" style="height:200px; object-fit:cover;">
                        <div class="card-body p-4">
                            <span class="small">{{ $data->tanggal }}</span>
                            <h5 class="card-title font-weight-bold">{{ $data->judul }}</h5>
                            <p class="card-text text-muted text-break overflow-hidden" style="display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical;">{{ $data->isi }}</p>
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
    document.querySelectorAll('.program-wrap').forEach((wrap) => {
        const slider = wrap.querySelector('.scroll-horizontal');
        if (!slider) return;

        const prev = wrap.querySelector('.program-nav.prev');
        const next = wrap.querySelector('.program-nav.next');

        // Drag to scroll logic
        let isDown = false, startX = 0, startScroll = 0;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX;
            startScroll = slider.scrollLeft;
        });

        window.addEventListener('mouseup', () => {
            isDown = false;
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            slider.scrollLeft = startScroll - (e.pageX - startX);
        });

        // Navigation buttons logic
        const getStep = () => {
            const card = slider.querySelector('.card');
            return card ? card.offsetWidth + 16 : 300;
        };

        const scrollSlider = (direction) => {
            slider.scrollBy({ left: direction * getStep(), behavior: 'smooth' });
        };

        prev?.addEventListener('click', () => scrollSlider(-1));
        next?.addEventListener('click', () => scrollSlider(1));
    });
</script>
@endpush