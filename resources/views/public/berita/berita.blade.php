@extends('public.nav')

@section('title', 'Berita - SMK YPC Tasikmalaya')

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

    /* PENCARIAN */
        .search-box { max-width: 520px; }
        .search-box .form-control { border-radius: 50px 0 0 50px; padding-left: 1.25rem; }
        .search-box .btn { border-radius: 0 50px 50px 0; padding-left: 1.25rem; padding-right: 1.25rem; }

    /* BERITA UTAMA (terbaru) */
        .berita-featured {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.12);
        }
        .berita-featured img {
            width: 100%;
            height: 100%;
            min-height: 280px;
            max-height: 380px;
            object-fit: cover;
        }

    /* KARTU BERITA */
        .berita-card {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.12);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .berita-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.18);
        }
        .berita-card img,
        .berita-img-empty {
            display: block;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .berita-img-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4e73df, #1c2a8c);
            color: rgba(255,255,255,.85);
            font-size: 3rem;
        }
        .berita-title a { color: inherit; }
        .berita-title a:hover { color: #4e73df; text-decoration: none; }
        .berita-excerpt {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .berita-title-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 575.98px) {
            .page-header { padding: 130px 0 50px; }
            .berita-featured img { min-height: 220px; }
        }
</style>
@endpush

@section('content')
    @php
        $tgl = fn ($v) => $v ? \Carbon\Carbon::parse($v)->translatedFormat('d F Y') : '';
        $isFirstPage = $data->currentPage() === 1 && !request('search');
        $utama = $isFirstPage ? $data->first() : null;
        $lainnya = $utama ? $data->slice(1) : $data;
    @endphp

    {{-- HEADER --}}
    <div class="page-header" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container">
            <span class="text-warning d-block mb-2">INFO TERKINI</span>
            <h1 class="font-weight-bold mb-3">Berita dan Artikel</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('public.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid py-5 section-gray">
        <div class="container text-center">
            <h3 class="font-weight-bold text-primary">Kabar Terbaru dari SMK YPC Tasikmalaya</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Ikuti kegiatan, prestasi, dan pengumuman terbaru dari sekolah kami.
            </p>

            <form action="{{ url()->current() }}" method="GET" class="search-box mx-auto">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                           class="form-control" placeholder="Cari berita..." aria-label="Cari berita">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" aria-label="Cari">
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

        @if ($utama)
            <div class="card berita-featured mb-5">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        @if ($utama->gambar)
                            <img src="{{ asset('storage/' . $utama->gambar) }}" alt="{{ $utama->judul }}">
                        @else
                            <div class="berita-img-empty h-100"><i class="fas fa-newspaper"></i></div>
                        @endif
                    </div>
                    <div class="col-lg-6 d-flex">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column justify-content-center">
                            <span class="text-warning font-weight-bold mb-1">BERITA TERBARU</span>
                            <small class="text-muted mb-2"> {{ $tgl($utama->tanggal) }} </small>
                            <h3 class="font-weight-bold berita-title">
                                <a href="{{ route('detail.berita', $utama->slug) }}">{{ $utama->judul }}</a>
                            </h3>
                            <p class="text-muted berita-excerpt">{{ $utama->isi }}</p>
                            <a href="{{ route('detail.berita', $utama->slug) }}" class="btn btn-primary align-self-start">
                                Baca selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @forelse ($lainnya as $item)
                <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4 mx-auto mx-md-0">
                    <div class="card berita-card h-100">
                        <a href="{{ route('detail.berita', $item->slug)}}">
                            @if ($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="card-img-top" loading="lazy">
                            @else
                                <div class="berita-img-empty"><i class="fas fa-newspaper"></i></div>
                            @endif

                            <div class="card-body p-4 d-flex flex-column">
                                <small class="text-muted mb-2"> {{ $tgl($item->tanggal) }} </small>
                                <h5 class="font-weight-bold berita-title berita-title-clamp">
                                    <a href="{{ route('detail.berita', $item->slug) }}">{{ $item->judul }}</a>
                                </h5>
                                <p class="card-text text-muted text-break berita-excerpt">
                                    {{$item->isi}}
                                </p>
                            </div>
                        </a>
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
            <div class="d-flex justify-content-center mt-4">
                {{ $data->onEachSide(1)->links() }}
            </div>
        @endif --}}
    </div>
@endsection