@extends('public.nav')

@section('title', 'Profil - SMK YPC Tasikmalaya')

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

    /* UTILITAS SECTION */
        .section-gray { background: var(--section-bg); }

    /* SEJARAH */
        .sejarah-img {
            width: 100%;
            height: 100%;
            min-height: 425px;
            max-height: 500px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.1);
        }
    /* TIMELINE */
        .tl-h {
            position: relative;
            display: flex;
            max-width: 1100px;
            margin: 0 auto;
        }

        /* garis: dari tengah dot pertama sampai tengah dot terakhir */
        .tl-h::before {
            content: '';
            position: absolute;
            top: 14px;
            left: 16.66%;
            right: 16.66%;
            height: 3px;
            background: #dee2e6;
        }

        .tl-h-item {
            flex: 1;
            position: relative;
            text-align: center;
            padding: 0 15px;
            transition: transform .18s ease;
        }

        .tl-h-item:hover {
            transform: scale(1.05)
        }

        /* dot */
        .tl-h-item::before {
            content: '';
            display: block;
            position: relative;
            z-index: 1;
            width: 20px;
            height: 20px;
            margin: 5px auto 15px;
            border-radius: 50%;
            background: #ffc107;
            border: 4px solid #fff;
            box-shadow: 0 0 0 2px #ffc107;
        }

        .tl-h-year {
            display: inline-block;
            margin-bottom: 8px;
            padding: 2px 14px;
            border-radius: 20px;
            background: #ffc107;
            color: #fff;
            font-weight: 700;
        }

        /* mobile: vertikal */
        @media (max-width: 767.98px) {
            .tl-h {
                flex-direction: column;
                padding-left: 30px;
            }
            .tl-h::before {
                top: 0;
                bottom: 0;
                left: 9px;
                right: auto;
                width: 3px;
                height: auto;
            }
            .tl-h-item {
                text-align: left;
                padding: 0 0 30px 20px;
            }
            .tl-h-item::before {
                position: absolute;
                left: -30px;
                top: 0;
                margin: 0;
            }
        }
    /* VISI & MISI */
        .vm-card {
            border: 0;
            border-bottom: 4px solid transparent;
            border-radius: 12px;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.06);
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }
        .vm-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,.15);
        }
        .vm-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
        }
        .misi-list {
            list-style: none;
            counter-reset: misi;
            padding-left: 0;
        }
        .misi-list li {
            counter-increment: misi;
            position: relative;
            padding-left: 2.5rem;
            margin-bottom: .9rem;
        }
        .misi-list li:last-child { margin-bottom: 0; }
        .misi-list li::before {
            content: counter(misi);
            position: absolute;
            left: 0;
            top: 0;
            width: 1.75rem;
            height: 1.75rem;
            line-height: 1.75rem;
            text-align: center;
            font-size: .85rem;
            font-weight: 700;
            color: #fff;
            background: #4e73df;
            border-radius: 50%;
        }

    /* VIDEO */
        .video-wrapper {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.15);
            background: #000;
        }
        .video-thumb {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            padding: 0;
            border: 0;
            background-size: cover;
            background-position: center;
            cursor: pointer;
        }
        .video-thumb::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,.3);
            transition: background .3s ease;
        }
        .video-thumb:hover::before { background: rgba(0,0,0,.1); }
        .video-play {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80px;
            height: 80px;
            margin: -40px 0 0 -40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #fff;
            background: rgba(220, 53, 69, .95);
            border-radius: 50%;
            transition: transform .3s ease;
        }
        .video-thumb:hover .video-play { transform: scale(1.12); }

        /* ========== CTA ========== */
        .cta-box { border-radius: 16px; }

        @media (max-width: 767.98px) {
            .sejarah-body { text-align: center; }
        }
        @media (max-width: 575.98px) {
            .page-header { padding: 130px 0 50px; }
            .sejarah-img { min-height: 280px; }
        }
</style>
@endpush

@section('content')
    {{-- HEADER --}}
    <div class="page-header" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container">
            <span class="text-warning d-block mb-2">TENTANG KAMI</span>
            <h1 class="font-weight-bold mb-3">Profil Sekolah</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- SEJARAH --}}
    <div class="container py-5 my-lg-4">
        <div class="row align-items-center">
            {{-- Gambar --}}
            <div class="col-md-5 mb-4 mb-md-0">
                <img src="{{ asset('assets/img/sample.jpg') }}" alt="Gedung SMK YPC Tasikmalaya" class="sejarah-img" loading="lazy">
            </div>

            {{-- Teks --}}
            <div class="col-md-7 pl-md-5 sejarah-body">
                <span class="text-warning d-block mb-1">SEKILAS SEKOLAH</span>
                <h2 class="text-primary font-weight-bold h3 mb-3">Sejarah SMK YPC Tasikmalaya</h2>
                <p>
                    SMK YPC Tasikmalaya didirikan pada 9 Juni 1997 di bawah naungan Yayasan Pesantren Cintawana untuk memadukan pendidikan kejuruan modern dengan nilai-nilai agama.
                    Pada awal berdiri, sekolah vokasi ini hanya membuka dua program keahlian, yaitu Elektronika Komunikasi dan Mekanik Otomotif.
                    Perkembangan besar terjadi saat sekolah mendapatkan bantuan dari Islamic Development Bank (IDB) pada tahun 1999 yang mempercepat pembangunan fasilitas gedung dan pengadaan alat praktik.
                </p>
                <p class="mb-0">
                    Saat ini, sekolah tersebut telah berkembang pesat menjadi salah satu SMK unggulan berakreditasi A di wilayah Singaparna, Tasikmalaya.
                    Dengan memadukan kurikulum industri dan lingkungan pesantren tradisional, SMK YPC sukses mencetak ribuan lulusan yang kompeten di bidang teknologi sekaligus memiliki karakter akhlakul karimah.
                </p>
            </div>
        </div>
    </div>


    {{-- TIMELINE --}}
    <div class="container-fluid py-5 my-lg-4 section-gray">
        <div class="text-center mb-5">
            <span class="text-warning">JEJAK LANGKAH</span>
            <h3 class="font-weight-bold text-primary">Perjalanan Kami</h3>
        </div>

        <div class="tl-h">
            <div class="tl-h-item">
                <span class="tl-h-year">1997</span>
                <h5 class="font-weight-bold text-dark mb-1">Sekolah Berdiri</h5>
                <p class="mb-0">Didirikan di bawah Yayasan Pesantren Cintawana dengan dua program keahlian: Elektronika Komunikasi dan Mekanik Otomotif.</p>
            </div>
            <div class="tl-h-item">
                <span class="tl-h-year">1999</span>
                <h5 class="font-weight-bold text-dark mb-1">Bantuan IDB</h5>
                <p class="mb-0">Islamic Development Bank memberi bantuan yang mempercepat pembangunan gedung dan pengadaan alat praktik.</p>
            </div>
            <div class="tl-h-item">
                <span class="tl-h-year">Kini</span>
                <h5 class="font-weight-bold text-dark mb-1">SMK Unggulan Berakreditasi A</h5>
                <p class="mb-0">Terus mencetak lulusan kompeten di bidang teknologi dengan karakter akhlakul karimah.</p>
            </div>
        </div>
    </div>

    {{-- VISI & MISI --}}
    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-warning">ARAH DAN TUJUAN</span>
                <h3 class="font-weight-bold text-primary">Visi dan Misi Sekolah Kami</h3>
            </div>

            <div class="row">
                {{-- Visi --}}
                <div class="col-lg-5 mb-4">
                    <div class="card vm-card h-100 p-4">
                        <div class="text-center">
                            <h5 class="text-center font-weight-bold mb-3">Visi</h5>
                        </div>
                        <p class="mb-0">
                            Menjadi SMK yang unggul dalam prestasi, didasari IMTAK, dihiasi Akhlakul Karimah, dan dibekali dengan IPTEK serta mampu bersaing pada tingkat Nasional dan Global.
                        </p>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="col-lg-7 mb-4">
                    <div class="card vm-card h-100 p-4">
                        <div class="text-center">
                            <h5 class="text-center font-weight-bold mb-3">Misi</h5>
                        </div>
                        <ul class="misi-list mb-0">
                            <li>Menumbuhkan semangat keunggulan dan kompetitif secara intensif kepada seluruh warga sekolah.</li>
                            <li>Mewujudkan lingkungan pendidikan yang kondusif, penuh kreativitas, kerjasama, dan dinamika dengan penonjolan prestasi tinggi.</li>
                            <li>Menyelenggarakan pendidikan yang aktif, efektif, efisien, berkualitas, permeabel, dan fleksibel yang berorientasi pada pencapaian kompetensi berstandar Nasional dan Internasional.</li>
                            <li>Menghasilkan tenaga kerja profesional di bidang teknologi untuk memenuhi tuntutan dunia usaha dan industri serta mengintensifkan hubungan dengan Dunia Usaha/Dunia Industri yang memiliki reputasi Nasional dan Internasional.</li>
                            <li>Membekali peserta didik untuk mampu mengembangkan diri.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- VIDEO PROFIL --}}
    <div class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-warning">SELAYANG PANDANG</span>
                <h3 class="font-weight-bold text-primary">Kenali Kami Lebih Dekat</h3>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="video-wrapper embed-responsive embed-responsive-16by9" id="videoProfil" data-video-id="YMZAeQDbWus">
                        <button type="button" class="video-thumb" aria-label="Putar video profil sekolah"
                                style="background-image: url('https://img.youtube.com/vi/YMZAeQDbWus/hqdefault.jpg');">
                            <span class="video-play"><i class="fas fa-play"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Video dimuat hanya saat thumbnail diklik, agar halaman lebih ringan
        document.querySelector('#videoProfil .video-thumb').addEventListener('click', function () {
            var box = this.parentElement;
            var id = box.dataset.videoId;
            box.innerHTML =
                '<iframe class="embed-responsive-item" ' +
                'src="https://www.youtube.com/embed/' + id + '?start=1&rel=0&autoplay=1" ' +
                'title="Video Profil Sekolah" ' +
                'allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" ' +
                'allowfullscreen></iframe>';
        });
    </script>
@endsection