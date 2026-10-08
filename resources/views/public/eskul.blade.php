@extends('public.temp')

@section('title', 'Ekstrakurikuler - SMK YPC Tasikmalaya')

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

    /* KARTU ESKUL */
        .eskul-card {
            border: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 .25rem .9rem rgba(0,0,0,.12);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .eskul-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.18);
        }
        .eskul-img,
        .eskul-img-empty {
            display: block;
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .eskul-img-empty {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #4e73df, #1c2a8c);
            color: rgba(255,255,255,.85);
            font-size: 3rem;
        }
        .eskul-desc {
            font-size: .9rem;
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .eskul-info { font-size: .85rem; }
        .eskul-info i { width: 1.25rem; color: #4e73df; }

    /* MODAL */
        #eskulModal .modal-content { border: 0; border-radius: 16px; overflow: hidden; }
        #eskulModal .modal-img { width: 100%; max-height: 280px; object-fit: cover; }
        #eskulModal .modal-desc { white-space: pre-line; }

        @media (max-width: 575.98px) {
            .page-header { padding: 130px 0 50px; }
        }
</style>
@endpush

@section('content')
    {{-- HEADER --}}
    <div class="page-header" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
        <div class="container">
            <span class="small font-weight-bold text-warning d-block">BAKAT DAN MINAT</span>
            <h1 class="font-weight-bold mb-3">Ekstrakurikuler</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ekstrakurikuler</li>
                </ol>
            </nav>
        </div>
    </div>
    
    <div class="container-fluid pt-5">
        <div class="container text-center">
            <h3 class="font-weight-bold text-primary">Temukan Bakat dan Minatmu bersama Kami</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Kegiatan ekstrakurikuler membantu siswa mengembangkan potensi, membangun karakter,
                dan memperluas pengalaman di luar jam pelajaran.
            </p>
        </div>
    </div>

    {{-- DAFTAR ESKUL --}}
    <div class="container pt-2 my-lg-4">
        @if ($data->isNotEmpty())
            <p class="text-muted mb-4">
                Menampilkan <strong>{{ $data->count() }}</strong> ekstrakurikuler
                @if (request('search')) untuk "<strong>{{ request('search') }}</strong>" @endif
            </p>
        @endif

        <div class="row">
            @forelse ($data as $item)
                @php $pembina = $item->guru?->nama ?? $item->pembina; @endphp
                <div class="col-12 col-sm-10 col-md-6 col-lg-4 mb-4 mx-auto mx-md-0">
                    <div class="card eskul-card h-100">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->namaEskul }}" class="eskul-img" loading="lazy">
                        @else
                            <div class="eskul-img-empty"><i class="fas fa-users"></i></div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="font-weight-bold text-dark mb-2">{{ $item->namaEskul }}</h5>
                            <p class="eskul-desc">{{ $item->deskripsi }}</p>

                            <div class="eskul-info text-muted mb-3">
                                <div class="mb-1"><i class="fas fa-calendar-alt"></i>{{ $item->jadwalLatihan }}</div>
                                <div><i class="fas fa-user"></i>{{ $pembina }}</div>
                            </div>

                            <button type="button" class="btn btn-outline-primary btn-sm mt-auto align-self-start"
                                    data-toggle="modal" data-target="#eskulModal"
                                    data-eskul
                                    data-nama="{{ $item->namaEskul }}"
                                    data-deskripsi="{{ $item->deskripsi }}"
                                    data-jadwal="{{ $item->jadwalLatihan }}"
                                    data-pembina="{{ $pembina }}"
                                    data-gambar="{{ $item->gambar ? asset('storage/' . $item->gambar) : '' }}">
                                Lihat detail <i class="fas fa-arrow-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="fas fa-search fa-2x mb-3 d-block"></i>
                    @if (request('search'))
                        Tidak ada ekstrakurikuler yang cocok dengan pencarian Anda.
                    @else
                        Belum ada data ekstrakurikuler.
                    @endif
                </div>
            @endforelse
        </div>
    </div>

    {{-- MODAL DETAIL --}}
    <div class="modal fade" id="eskulModal" tabindex="-1" role="dialog" aria-labelledby="eskulModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <img src="" alt="" class="modal-img d-none" id="eskulModalImg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-primary" id="eskulModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-desc" id="eskulModalDesc"></p>
                    <div class="eskul-info text-muted">
                        <div class="mb-1"><i class="fas fa-calendar-alt"></i><span id="eskulModalJadwal"></span></div>
                        <div><i class="fas fa-user"></i><span id="eskulModalPembina"></span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    (function () {
        const img = document.getElementById('eskulModalImg');

        document.querySelectorAll('[data-eskul]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('eskulModalTitle').textContent   = btn.dataset.nama;
                document.getElementById('eskulModalDesc').textContent    = btn.dataset.deskripsi;
                document.getElementById('eskulModalJadwal').textContent  = btn.dataset.jadwal;
                document.getElementById('eskulModalPembina').textContent = btn.dataset.pembina;

                if (btn.dataset.gambar) {
                    img.src = btn.dataset.gambar;
                    img.alt = btn.dataset.nama;
                    img.classList.remove('d-none');
                } else {
                    img.classList.add('d-none');
                }
            });
        });
    })();
</script>
@endpush