@extends('public.temp')

@section('title', 'Jurusan - SMK YPC Tasikmalaya')

@push('style')
<style>
    /* Hanya animasi hover */
    .hover-fill {
        color: #4e73df;
        transition: background-color .25s ease, color .25s ease, transform .25s ease;
    }
    .hover-fill:hover {
        background-color: #4e73df !important;
        color: #fff !important;
        transform: translateY(-2px);
    }
</style>
@endpush

@section('content')
    @php
        // Kolom materi & karier berupa teks: satu butir per baris (atau dipisah koma)
        $pecah = fn ($teks) => array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n|,/', (string) $teks))));
    @endphp

    {{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">PROGRAM KEAHLIAN</span>
            <h1 class="font-weight-bold mb-3">Jurusan</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Jurusan</li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- PENGANTAR --}}
    <div class="container-fluid py-5 bg-light">
        <div class="container text-center pt-2">
            <h3 class="font-weight-bold text-primary">Program Keahlian di SMK YPC Tasikmalaya</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Setiap program keahlian dirancang dengan kurikulum berbasis industri, fasilitas praktik yang memadai,
                dan pembinaan karakter agar lulusan siap bekerja, melanjutkan studi, maupun berwirausaha.
            </p>

            <div class="d-flex flex-wrap justify-content-center">
                @foreach ($data as $item)
                    <a href="#{{ $item->alias }}"
                       class="btn btn-sm btn-light rounded-pill shadow-sm px-3 mx-1 mb-2 hover-fill">
                        {{ $item->alias }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- DETAIL JURUSAN --}}
    @forelse ($data as $item)
        <div id="{{ \Illuminate\Support\Str::slug($item->alias) }}" class="{{ $loop->even ? 'bg-light' : '' }}" style="scroll-margin-top: 90px;">
            <div class="container py-5 my-lg-4">
                <div class="row align-items-center">
                    {{-- Gambar --}}
                    <div class="col-md-5 mb-4 mb-md-0 {{ $loop->even ? 'order-md-2' : '' }}">
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}"
                             class="d-block w-100 shadow"
                             style="height: clamp(260px, 45vw, 340px); object-fit: cover; border-radius: 16px; background: #d9d9d9;"
                             loading="lazy">
                    </div>

                    {{-- Teks --}}
                    <div class="col-md-7 text-center text-md-left {{ $loop->even ? 'pr-md-5 order-md-1' : 'pl-md-5' }}">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" onerror="this.style.display='none'" style="height: 100px;">
                            </div>
                            <div class="col text-left">
                                <span class="text-warning font-weight-bold d-block">{{ $item->alias }}</span>
                                <span class="text-primary font-weight-bold h3">{{ $item->nama }}</span>
                            </div>
                        </div>
                        <p>{{ $item->deskripsi }}</p>

                        <h6 class="font-weight-bold text-dark mt-4 mb-2">Kompetensi yang Dipelajari</h6>
                        <div class="mb-3">
                            @foreach ($pecah($item->materi) as $k)
                                <span class="badge badge-pill text-primary px-3 py-2 mr-1 mb-2"
                                      style="background: rgba(78,115,223,.1); font-size: .82rem;">{{ $k }}</span>
                            @endforeach
                        </div>

                        <h6 class="font-weight-bold text-dark mb-2">Prospek Karier</h6>
                        <ul class="list-unstyled mb-0 d-inline-block d-md-block text-left">
                            @foreach ($pecah($item->karier) as $k)
                                <li class="d-flex align-items-start mb-1">
                                    <i class="fas fa-check text-success small mr-2 mt-1"></i>
                                    <span>{{ $k }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="container text-center text-muted py-5 my-lg-4">
            <i class="fas fa-graduation-cap fa-2x mb-3 d-block"></i>
            Belum ada data jurusan.
        </div>
    @endforelse
@endsection