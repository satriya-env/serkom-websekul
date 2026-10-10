@extends('public.temp')

@section('title', 'Profil - SMK YPC Tasikmalaya')

@push('style')
<style>
    /* Hanya animasi hover */
    .hover-lift,
    .hover-zoom,
    .video-play {
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .15) !important;
    }
    .hover-zoom:hover {
        transform: scale(1.05);
    }
    .video-thumb:hover .video-play {
        transform: scale(1.12);
    }
</style>
@endpush

@section('content')
    {{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">TENTANG KAMI</span>
            <h1 class="font-weight-bold mb-3">Profil Sekolah</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Profil</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- SEJARAH --}}
    <div class="container py-5 my-lg-4">
        <div class="row align-items-center">
            {{-- Gambar --}}
            <div class="col-md-5 mb-4 mb-md-0">
                <img src="{{ asset('assets/img/sample.jpg') }}"
                     alt="Gedung SMK YPC Tasikmalaya"
                     class="img-fluid w-100 rounded shadow-sm"
                     loading="lazy">
            </div>

            {{-- Teks --}}
            <div class="col-md-7 pl-md-5 text-center text-md-left">
                <span class="text-warning d-block mb-1">SEKILAS SEKOLAH</span>
                <h2 class="text-primary font-weight-bold h3 mb-3">Sejarah SMK YPC Tasikmalaya</h2>
                <p>{{ $profil->sejarah }}</p>
            </div>
        </div>
    </div>

    {{-- TIMELINE --}}
    <div class="bg-light py-5 my-lg-4">
        <div class="container">
            <div class="text-center mb-5">
                <span class="text-warning">JEJAK LANGKAH</span>
                <h3 class="font-weight-bold text-primary">Perjalanan Kami</h3>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="h-100 border-0 border-top border-warning text-center hover-zoom">
                        <div class="">
                            <span class="badge badge-warning badge-pill text-white px-3 py-2 mb-3">1997</span>
                            <h5 class="font-weight-bold text-dark">Sekolah Berdiri</h5>
                            <p class="mb-0">Didirikan di bawah Yayasan Pesantren Cintawana dengan dua program keahlian: Elektronika Komunikasi dan Mekanik Otomotif.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="h-100 border-0 border-top border-warning text-center hover-zoom">
                        <div class="">
                            <span class="badge badge-warning badge-pill text-white px-3 py-2 mb-3">1999</span>
                            <h5 class="font-weight-bold text-dark">Bantuan IDB</h5>
                            <p class="mb-0">Islamic Development Bank memberi bantuan yang mempercepat pembangunan gedung dan pengadaan alat praktik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 border-0 border-top border-warning text-center hover-zoom">
                        <div class="">
                            <span class="badge badge-warning badge-pill text-white px-3 py-2 mb-3">Kini</span>
                            <h5 class="font-weight-bold text-dark">SMK Unggulan Berakreditasi A</h5>
                            <p class="mb-0">Terus mencetak lulusan kompeten di bidang teknologi dengan karakter akhlakul karimah.</p>
                        </div>
                    </div>
                </div>
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
                    <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                        <h5 class="text-center font-weight-bold mb-3">Visi</h5>
                        <p class="text-center mb-0">{{ $profil->visi }}</p>
                    </div>
                </div>

                {{-- Misi --}}
                <div class="col-lg-7 mb-4">
                    <div class="card h-100 border-0 shadow-sm p-4 hover-lift">
                        <h5 class="text-center font-weight-bold mb-3">Misi</h5>
                        @php
                            $items = array_filter(array_map('trim', explode('.', $profil->misi)));
                        @endphp

                        <ul class="list-unstyled mb-0">
                            @foreach ($items as $item)
                                <li class="d-flex align-items-start mb-3">
                                    <span class="badge badge-primary badge-pill mr-3 mt-1">{{ $loop->iteration }}</span>
                                    <span>{{ $item }}.</span>
                                </li>
                            @endforeach
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
                    <div class="embed-responsive embed-responsive-16by9 rounded shadow bg-dark overflow-hidden"
                         id="videoProfil" data-video-id="YMZAeQDbWus">
                        <button type="button"
                                class="video-thumb embed-responsive-item border-0 p-0 d-flex align-items-center justify-content-center"
                                aria-label="Putar video profil sekolah"
                                style="background-image: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)), url('https://img.youtube.com/vi/YMZAeQDbWus/hqdefault.jpg'); background-size: cover; background-position: center; cursor: pointer;">
                            <span class="video-play bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center p-4">
                                <i class="fas fa-play fa-2x fa-fw"></i>
                            </span>
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