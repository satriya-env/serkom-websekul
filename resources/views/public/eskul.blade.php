@extends('public.temp')

@section('title', 'Ekstrakurikuler - SMK YPC Tasikmalaya')

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
</style>
@endpush

@section('content')
    @php
        $clamp = fn ($n) => "display:-webkit-box;-webkit-line-clamp:{$n};-webkit-box-orient:vertical;overflow:hidden;";
    @endphp

    {{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">BAKAT DAN MINAT</span>
            <h1 class="font-weight-bold mb-3">Ekstrakurikuler</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Ekstrakurikuler</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- PENGANTAR --}}
    <div class="container-fluid pt-5">
        <div class="container text-center pt-2">
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
                    <div class="card border-0 shadow h-100 overflow-hidden hover-lift" style="border-radius: 16px;">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->namaEskul }}"
                                 class="card-img-top w-100 d-block" style="height: 200px; object-fit: cover;" loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-gradient-primary text-white-50"
                                 style="height: 200px;">
                                <i class="fas fa-users fa-3x"></i>
                            </div>
                        @endif

                        <div class="card-body p-4 d-flex flex-column">
                            <h5 class="font-weight-bold text-dark mb-2">{{ $item->namaEskul }}</h5>
                            <p class="small text-muted" style="{{ $clamp(3) }}">{{ $item->deskripsi }}</p>

                            <div class="small text-muted mb-3">
                                <div class="mb-1"><i class="fas fa-calendar-alt fa-fw text-primary mr-1"></i>{{ $item->jadwalLatihan }}</div>
                                <div><i class="fas fa-user fa-fw text-primary mr-1"></i>{{ $pembina }}</div>
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
            <div class="modal-content border-0 overflow-hidden" style="border-radius: 16px;">
                <img src="" alt="" class="w-100 d-none" style="max-height: 280px; object-fit: cover;" id="eskulModalImg">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title font-weight-bold text-primary" id="eskulModalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="white-space: pre-line;" id="eskulModalDesc"></p>
                    <div class="small text-muted">
                        <div class="mb-1"><i class="fas fa-calendar-alt fa-fw text-primary mr-1"></i><span id="eskulModalJadwal"></span></div>
                        <div><i class="fas fa-user fa-fw text-primary mr-1"></i><span id="eskulModalPembina"></span></div>
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