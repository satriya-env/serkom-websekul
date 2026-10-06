@extends('public.nav')

@section('title', $baru->judul . ' - SMK YPC Tasikmalaya')

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
        .page-header h1 { font-size: clamp(1.5rem, 4.5vw, 2.5rem); max-width: 900px; }
        .page-header .breadcrumb { background: transparent; padding: 0; margin: 0; }
        .page-header .breadcrumb a,
        .page-header .breadcrumb-item.active,
        .page-header .breadcrumb-item + .breadcrumb-item::before { color: rgba(255,255,255,.85); }
        .page-header .breadcrumb-item.active {
            max-width: 260px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    /* ARTIKEL */
        .artikel-img {
            display: block;
            width: 100%;
            max-height: 460px;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.15);
        }
        .artikel-meta { font-size: .9rem; }
        .artikel-body {
            max-width: 720px;
            font-size: 1.05rem;
            line-height: 1.8;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

    /* SHARE */
        .share-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 50%;
            color: #fff;
            border: 0;
            transition: transform .25s ease, opacity .25s ease;
        }
        .share-btn:hover { color: #fff; text-decoration: none; transform: translateY(-2px); opacity: .9; }
        .share-fb { background: #1877f2; }
        .share-wa { background: #25d366; }
        .share-x  { background: #111; }
        .share-cp { background: #6c757d; }

    /* SIDEBAR */
        .side-card {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.1);
        }
        .side-item {
            display: flex;
            padding: .85rem 0;
            border-bottom: 1px solid #eee;
            color: inherit;
        }
        .side-item:last-child { border-bottom: 0; padding-bottom: 0; }
        .side-item:first-child { padding-top: 0; }
        .side-item:hover { text-decoration: none; color: inherit; }
        .side-item:hover .side-title { color: #4e73df; }
        .side-thumb {
            flex-shrink: 0;
            width: 80px;
            height: 64px;
            margin-right: .85rem;
            border-radius: 10px;
            object-fit: cover;
            background: linear-gradient(135deg, #4e73df, #1c2a8c);
        }
        .side-title {
            font-size: .92rem;
            line-height: 1.35;
            font-weight: 700;
            transition: color .2s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (min-width: 992px) {
            .side-sticky { position: sticky; top: 100px; }
        }
        @media (max-width: 575.98px) {
            .page-header { padding: 130px 0 50px; }
            .page-header .breadcrumb-item.active { max-width: 140px; }
        }
</style>
@endpush

@section('content')
    {{-- HEADER --}}
    <div class="page-header" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container">
            <span class="text-warning d-block mb-2">BERITA</span>
            <h1 class="font-weight-bold mb-3">{{ $baru->judul }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('public.home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('public.berita') }}">Berita</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $baru->judul }}</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- ISI --}}
    <div class="container py-5 my-lg-4">
        <div class="row">
            {{-- Artikel --}}
            <div class="col-lg-8 mb-5 mb-lg-0">
                @if ($baru->gambar)
                    <img src="{{ asset('storage/' . $baru->gambar) }}" alt="{{ $baru->judul }}" class="artikel-img mb-4">
                @endif

                <div class="artikel-meta text-muted mb-4">
                    <i class="fas fa-calendar-alt mr-1"></i>{{ $baru->tanggal }}
                </div>

                <div class="artikel-body">{{ $baru->isi }}</div>
            </div>

            {{-- Sidebar: berita lainnya --}}
            <div class="col-lg-4">
                <div class="side-sticky">
                    <div class="card side-card">
                        <div class="card-body p-4">
                            <h5 class="font-weight-bold text-primary mb-3">Berita Lainnya</h5>

                            @forelse ($data as $item)
                                <a href="{{ route('detail.berita', $item->slug) }}" class="side-item">
                                    @if ($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="side-thumb" loading="lazy">
                                    @else
                                        <span class="side-thumb d-flex align-items-center justify-content-center text-white">
                                            <i class="fas fa-newspaper"></i>
                                        </span>
                                    @endif
                                    <span>
                                        <span class="side-title">{{ $item->judul }}</span>
                                        <small class="text-muted">{{$item->tanggal}}</small>
                                    </span>
                                </a>
                            @empty
                                <p class="text-muted mb-0">Belum ada berita lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection