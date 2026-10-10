@extends('public.temp')

@section('title', 'Galeri - SMK YPC Tasikmalaya')

@push('style')
<style>
    /* Hanya animasi hover */
    .hover-lift,
    .hover-up {
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .hover-lift:hover {
        transform: translateY(-6px);
        box-shadow: 0 .75rem 1.5rem rgba(0, 0, 0, .18) !important;
    }
    .hover-up:hover {
        transform: translateY(-2px);
    }
    .galeri-media {
        transition: transform .4s ease, opacity .3s ease;
    }
    .galeri-card:hover .galeri-media {
        transform: scale(1.06);
        opacity: .85;
    }
    .galeri-play {
        transition: transform .3s ease;
    }
    .galeri-card:hover .galeri-play {
        transform: scale(1.12);
    }
</style>
@endpush

@section('content')
    {{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">ARSIP KAMI</span>
            <h1 class="font-weight-bold mb-3">Galeri</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Galeri</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- PENGANTAR + FILTER --}}
    <div class="container-fluid py-5 bg-light">
        <div class="container text-center pt-2">
            <h3 class="font-weight-bold text-primary">Dokumentasi Kegiatan SMK YPC Tasikmalaya</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Kumpulan foto dan video yang merekam kegiatan belajar, prestasi, dan keseharian di sekolah kami.
            </p>

            <div class="d-flex flex-wrap justify-content-center">
                <button type="button" class="filter-btn btn btn-sm btn-primary text-white rounded-pill shadow-sm font-weight-bold px-3 mx-1 mb-2 hover-up" data-filter="all">
                    Semua ({{ $galeri->count() }})
                </button>
                <button type="button" class="filter-btn btn btn-sm btn-light text-primary rounded-pill shadow-sm font-weight-bold px-3 mx-1 mb-2 hover-up" data-filter="Foto">
                    <i class="fas fa-image mr-1"></i>Foto ({{ $galeri->where('kategori', 'Foto')->count() }})
                </button>
                <button type="button" class="filter-btn btn btn-sm btn-light text-primary rounded-pill shadow-sm font-weight-bold px-3 mx-1 mb-2 hover-up" data-filter="Video">
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
                    <button type="button"
                            class="galeri-card position-relative d-block w-100 p-0 border-0 bg-dark text-left overflow-hidden shadow hover-lift"
                            style="border-radius: 16px; cursor: pointer;"
                            data-toggle="modal" data-target="#galeriModal"
                            data-galeri
                            data-tipe="{{ $item->kategori }}"
                            data-url="{{ $url }}"
                            data-judul="{{ $item->judul }}"
                            data-tanggal="{{ $tanggal }}"
                            data-keterangan="{{ $item->keterangan }}">
                        @if ($isVideo)
                            <video class="galeri-media d-block w-100" style="height: 240px; object-fit: cover; pointer-events: none;"
                                   src="{{ $url }}#t=0.5" preload="metadata" muted playsinline></video>
                        @else
                            <img src="{{ $url }}" alt="{{ $item->judul }}" class="galeri-media d-block w-100"
                                 style="height: 240px; object-fit: cover; pointer-events: none;" loading="lazy">
                        @endif

                        {{-- Gradasi gelap di bawah --}}
                        <span class="position-absolute"
                              style="inset: 0; background: linear-gradient(to top, rgba(0,0,0,.8), rgba(0,0,0,0) 55%); pointer-events: none;"></span>

                        @if ($isVideo)
                            <span class="galeri-play position-absolute d-flex align-items-center justify-content-center rounded-circle bg-danger text-white"
                                  style="top: 50%; left: 50%; width: 56px; height: 56px; margin: -28px 0 0 -28px;">
                                <i class="fas fa-play"></i>
                            </span>
                        @endif

                        <span class="position-absolute badge badge-light badge-pill text-primary px-3 py-1"
                              style="top: 12px; left: 12px;">
                            <i class="fas {{ $isVideo ? 'fa-video' : 'fa-image' }} mr-1"></i>{{ $item->kategori }}
                        </span>

                        <span class="position-absolute w-100 p-3 text-white" style="left: 0; bottom: 0;">
                            <h6 class="font-weight-bold mb-1">{{ $item->judul }}</h6>
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
            <div class="modal-content border-0 overflow-hidden" style="border-radius: 16px;">
                <div class="bg-dark text-center" id="galeriModalMedia"></div>
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
                    <p class="mb-0" style="white-space: pre-line;" id="galeriModalDesc"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    (function () {
        const items   = document.querySelectorAll('.galeri-item');
        const buttons = document.querySelectorAll('.filter-btn');
        const empty   = document.getElementById('galeriEmpty');
        const media   = document.getElementById('galeriModalMedia');
        const modal   = document.getElementById('galeriModal');

        // Filter Semua / Foto / Video
        buttons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                buttons.forEach(function (b) {
                    b.classList.remove('btn-primary', 'text-white');
                    b.classList.add('btn-light', 'text-primary');
                });
                btn.classList.remove('btn-light', 'text-primary');
                btn.classList.add('btn-primary', 'text-white');

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
                el.className = 'd-block w-100';
                el.style.maxHeight = '70vh';
                el.style.objectFit = 'contain';
                el.src = card.dataset.url;
                media.appendChild(el);
            });
        });

        // Hentikan & bersihkan video saat modal ditutup
        if (window.jQuery) {
            window.jQuery(modal).on('hidden.bs.modal', function () { media.innerHTML = ''; });
        }
    })();
</script>
@endpush