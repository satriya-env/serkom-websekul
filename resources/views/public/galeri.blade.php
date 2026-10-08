@extends('public.temp')

@section('title', 'Galeri - SMK YPC Tasikmalaya')

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

    /* FILTER */
        .filter-nav { gap: .5rem; }
        .filter-btn {
            padding: .4rem 1.25rem;
            border: 0;
            border-radius: 50px;
            background: #fff;
            color: #4e73df;
            font-size: .85rem;
            font-weight: 600;
            box-shadow: 0 .15rem .5rem rgba(0,0,0,.1);
            transition: background .25s ease, color .25s ease, transform .25s ease;
        }
        .filter-btn:hover { transform: translateY(-2px); }
        .filter-btn:focus { outline: none; }
        .filter-btn.active { background: #4e73df; color: #fff; }

    /* KARTU GALERI */
        .galeri-card {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            border: 0;
            border-radius: 16px;
            overflow: hidden;
            background: #000;
            text-align: left;
            cursor: pointer;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.12);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .galeri-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.18);
        }
        .galeri-card:focus { outline: none; box-shadow: 0 0 0 3px rgba(78,115,223,.5); }
        .galeri-media {
            display: block;
            width: 100%;
            height: 240px;
            object-fit: cover;
            pointer-events: none;
            transition: transform .4s ease, opacity .3s ease;
        }
        .galeri-card:hover .galeri-media { transform: scale(1.06); opacity: .85; }
        .galeri-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,0) 55%);
            pointer-events: none;
        }
        .galeri-caption {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
            padding: 1rem 1.1rem;
            color: #fff;
        }
        .galeri-caption h6 { margin-bottom: .15rem; font-weight: 700; }
        .galeri-caption small { opacity: .85; }
        .galeri-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 1;
            padding: .15rem .7rem;
            border-radius: 50px;
            background: rgba(255,255,255,.92);
            color: #4e73df;
            font-size: .72rem;
            font-weight: 700;
        }
        .galeri-play {
            position: absolute;
            top: 50%;
            left: 50%;
            z-index: 1;
            width: 56px;
            height: 56px;
            margin: -28px 0 0 -28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(220,53,69,.95);
            color: #fff;
            font-size: 1.2rem;
            transition: transform .3s ease;
        }
        .galeri-card:hover .galeri-play { transform: scale(1.12); }

    /* MODAL */
        #galeriModal .modal-content { border: 0; border-radius: 16px; overflow: hidden; }
        #galeriModal .modal-media {
            background: #000;
            text-align: center;
        }
        #galeriModal .modal-media img,
        #galeriModal .modal-media video {
            display: block;
            width: 100%;
            max-height: 70vh;
            object-fit: contain;
        }
        #galeriModal .modal-desc { white-space: pre-line; }

        @media (max-width: 575.98px) {
            .page-header { padding: 130px 0 50px; }
            .galeri-media { height: 200px; }
        }
</style>
@endpush

@section('content')
    {{-- HEADER --}}
    <div class="page-header" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container">
            <span class="small font-weight-bold text-warning d-block">ARSIP KAMI</span>
            <h1 class="font-weight-bold mb-3">Galeri</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- PENGANTAR + FILTER --}}
    <div class="container-fluid py-5 section-gray">
        <div class="container text-center">
            <h3 class="font-weight-bold text-primary">Dokumentasi Kegiatan SMK YPC Tasikmalaya</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Kumpulan foto dan video yang merekam kegiatan belajar, prestasi, dan keseharian di sekolah kami.
            </p>

            <div class="filter-nav d-flex flex-wrap justify-content-center">
                <button type="button" class="filter-btn active" data-filter="all">
                    Semua ({{ $galeri->count() }})
                </button>
                <button type="button" class="filter-btn" data-filter="Foto">
                    <i class="fas fa-image mr-1"></i>Foto ({{ $galeri->where('kategori', 'Foto')->count() }})
                </button>
                <button type="button" class="filter-btn" data-filter="Video">
                    <i class="fas fa-video mr-1"></i>Video ({{ $galeri->where('kategori', 'Video')->count() }})
                </button>
            </div>
        </div>
    </div>

    {{-- GRID GALERI --}}
    <div class="container py-5 my-lg-4">
        <div class="row" id="galeriGrid">
            @foreach ($galeri as $item)
                @php
                    $isVideo = $item->kategori === 'Video';
                    $url     = asset('storage/' . $item->file);
                    $tanggal = $item->tanggal ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') : '';
                @endphp
                <div class="col-12 col-sm-6 col-lg-4 mb-4 galeri-item" data-kategori="{{ $item->kategori }}">
                    <button type="button" class="galeri-card"
                            data-toggle="modal" data-target="#galeriModal"
                            data-galeri
                            data-tipe="{{ $item->kategori }}"
                            data-url="{{ $url }}"
                            data-judul="{{ $item->judul }}"
                            data-tanggal="{{ $tanggal }}"
                            data-keterangan="{{ $item->keterangan }}">
                        @if ($isVideo)
                            <video class="galeri-media" src="{{ $url }}#t=0.5" preload="metadata" muted playsinline></video>
                            <span class="galeri-play"><i class="fas fa-play"></i></span>
                        @else
                            <img src="{{ $url }}" alt="{{ $item->judul }}" class="galeri-media" loading="lazy">
                        @endif

                        <span class="galeri-badge">
                            <i class="fas {{ $isVideo ? 'fa-video' : 'fa-image' }} mr-1"></i>{{ $item->kategori }}
                        </span>

                        <span class="galeri-caption">
                            <h6>{{ $item->judul }}</h6>
                            @if ($tanggal)
                                <small><i class="fas fa-calendar-alt mr-1"></i>{{ $tanggal }}</small>
                            @endif
                        </span>
                    </button>
                </div>
            @endforeach
        </div>

        {{-- Pesan kosong (ditampilkan oleh JS saat filter tidak ada hasil) --}}
        <div id="galeriEmpty" class="text-center text-muted py-5 {{ $galeri->isEmpty() ? '' : 'd-none' }}">
            <i class="fas fa-images fa-2x mb-3 d-block"></i>
            Belum ada data galeri.
        </div>
    </div>

    {{-- MODAL DETAIL --}}
    <div class="modal fade" id="galeriModal" tabindex="-1" role="dialog" aria-labelledby="galeriModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-media" id="galeriModalMedia"></div>
                <div class="modal-header border-0 pb-0">
                    <div>
                        <h5 class="modal-title font-weight-bold text-primary" id="galeriModalTitle"></h5>
                        <small class="text-muted" id="galeriModalTanggal"></small>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-desc mb-0" id="galeriModalDesc"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    (function () {
        const items  = document.querySelectorAll('.galeri-item');
        const empty  = document.getElementById('galeriEmpty');
        const media  = document.getElementById('galeriModalMedia');
        const modal  = document.getElementById('galeriModal');

        // Filter Semua / Foto / Video
        document.querySelectorAll('.filter-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filter = btn.dataset.filter;
                let visible = 0;
                items.forEach(function (el) {
                    const show = filter === 'all' || el.dataset.kategori === filter;
                    el.classList.toggle('d-none', !show);
                    if (show) visible++;
                });

                empty.classList.toggle('d-none', visible > 0);
                empty.lastChild.textContent = filter === 'all'
                    ? 'Belum ada data galeri.'
                    : 'Belum ada ' + filter.toLowerCase() + ' di galeri.';
            });
        });

        // Isi modal saat kartu diklik
        document.querySelectorAll('[data-galeri]').forEach(function (card) {
            card.addEventListener('click', function () {
                document.getElementById('galeriModalTitle').textContent   = card.dataset.judul;
                document.getElementById('galeriModalTanggal').textContent = card.dataset.tanggal;

                const desc = document.getElementById('galeriModalDesc');
                desc.textContent = card.dataset.keterangan || '';
                desc.parentElement.classList.toggle('d-none', !card.dataset.keterangan);

                media.innerHTML = '';
                let el;
                if (card.dataset.tipe === 'Video') {
                    el = document.createElement('video');
                    el.controls = true;
                    el.autoplay = true;
                    el.playsInline = true;
                } else {
                    el = document.createElement('img');
                    el.alt = card.dataset.judul;
                }
                el.src = card.dataset.url;
                media.appendChild(el);
            });
        });

        // Hentikan & bersihkan video saat modal ditutup
        modal.addEventListener('hidden.bs.modal', function () { media.innerHTML = ''; });
        if (window.jQuery) {
            window.jQuery(modal).on('hidden.bs.modal', function () { media.innerHTML = ''; });
        }
    })();
</script>
@endpush