@extends('public.temp')

@section('title', 'Berita - SMK YPC Tasikmalaya')

@push('style')
<style>
    /* Hanya animasi hover */
    .hover-lift {
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .hover-lift:hover {
        transform: translateY(-6px);
        box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .18) !important;
    }
    .hover-link {
        transition: color .2s ease;
    }
    .hover-link:hover {
        color: #4e73df !important;
        text-decoration: none;
    }
</style>
@endpush

@section('content')
    @php
        $tgl = fn ($v) => $v ? \Carbon\Carbon::parse($v)->translatedFormat('d F Y') : '';
        $clamp = fn ($n) => "display:-webkit-box;-webkit-line-clamp:{$n};-webkit-box-orient:vertical;overflow:hidden;";
        $isFirstPage = $data->currentPage() === 1 && !request('search');
        $utama = $isFirstPage ? $data->first() : null;
        $lainnya = $utama ? $data->slice(1) : $data;
    @endphp

    {{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">INFO TERKINI</span>
            <h1 class="font-weight-bold mb-3">Artikel</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ route('public.home') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- PENGANTAR + PENCARIAN --}}
    <div class="container-fluid py-5 bg-light">
        <div class="container text-center pt-2">
            <h3 class="font-weight-bold text-primary">Kabar Terbaru dari SMK YPC Tasikmalaya</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Ikuti kegiatan, prestasi, dan pengumuman terbaru dari sekolah kami.
            </p>

            <form action="{{ url()->current() }}" method="GET" class="mx-auto" style="max-width: 520px;">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                           class="form-control pl-4" style="border-radius: 50px 0 0 50px;"
                           placeholder="Cari berita..." aria-label="Cari berita">
                    <div class="input-group-append">
                        <button class="btn btn-primary px-4" style="border-radius: 0 50px 50px 0;" type="submit" aria-label="Cari">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- DAFTAR BERITA --}}
    <div class="container py-5 my-lg-4">
        @if ($data->total() > 0)
            <p class="text-muted mb-4">
                Menampilkan <strong>{{ $data->total() }}</strong> berita
                @if (request('search')) untuk "<strong>{{ request('search') }}</strong>" @endif
            </p>
        @endif

        {{-- BERITA UTAMA --}}
        @if ($utama)
            <div class="card border-0 shadow overflow-hidden mb-5" style="border-radius: 16px;">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        @if ($utama->gambar)
                            <img src="{{ asset('storage/' . $utama->gambar) }}" alt="{{ $utama->judul }}"
                                 class="w-100 h-100 d-block"
                                 style="min-height: 280px; max-height: 380px; object-fit: cover;">
                        @else
                            <div class="d-flex align-items-center justify-content-center h-100 bg-gradient-primary text-white-50"
                                 style="min-height: 280px;">
                                <i class="fas fa-newspaper fa-3x"></i>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-center">
                            <span class="text-warning font-weight-bold mb-1">BERITA TERBARU</span>
                            <small class="text-muted mb-2">{{ $tgl($utama->tanggal) }}</small>
                            <h3 class="font-weight-bold">
                                <a href="{{ route('detail.berita', $utama->slug) }}" class="text-reset hover-link">{{ $utama->judul }}</a>
                            </h3>
                            <p class="text-muted" style="{{ $clamp(3) }}">{{ $utama->isi }}</p>
                            <a href="{{ route('detail.berita', $utama->slug) }}" class="btn btn-primary align-self-start">
                                Baca selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- BERITA LAINNYA --}}
        <div class="row">
            @forelse ($lainnya as $item)
                <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4 mx-auto mx-md-0">
                    <div class="card border-0 shadow h-100 overflow-hidden hover-lift" style="border-radius: 16px;">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                 class="card-img-top w-100 d-block" style="height: 200px; object-fit: cover;" loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-gradient-primary text-white-50"
                                 style="height: 200px;">
                                <i class="fas fa-newspaper fa-3x"></i>
                            </div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column">
                            <small class="text-muted mb-2">{{ $tgl($item->tanggal) }}</small>
                            <h5 class="font-weight-bold" style="{{ $clamp(2) }}">
                                <a href="{{ route('detail.berita', $item->slug) }}" class="text-reset hover-link stretched-link">{{ $item->judul }}</a>
                            </h5>
                            <p class="card-text text-muted text-break" style="{{ $clamp(3) }}">{{ $item->isi }}</p>
                        </div>
                    </div>
                </div>
            @empty
                @if (!$utama)
                    <div class="col-12 text-center text-muted py-5">
                        @if (request('search'))
                            Tidak ada berita yang cocok dengan pencarian Anda.
                        @else
                            Belum ada berita.
                        @endif
                    </div>
                @endif
            @endforelse
        </div>

        {{-- PAGINATION --}}
        {{-- @if ($data->hasPages())
            <nav class="d-flex justify-content-center mt-4" aria-label="Navigasi halaman berita">
                {{ $data->onEachSide(1)->appends(request()->query())->links('pagination::bootstrap-4') }}
            </nav>
        @endif --}}
    </div>
@endsection