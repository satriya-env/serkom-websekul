@extends('public.temp')

@section('title', 'Daftar Guru - SMK YPC Tasikmalaya')

@push('style')
    <style>
        #cardGuru{
            transition: .25;
        }
        #cardguru:hover{
            scale: 1.05;
        }
    </style>
@endpush
@section('content')
    {{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">TENAGA PENDIDIK</span>
            <h1 class="font-weight-bold m-0">Daftar Guru</h1>
            <nav aria-label="breadcrumb" class="p-0 m-0">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ route('public.home') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Daftar Guru</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid py-5 bg-gray-200">
        <div class="container text-center pt-2">
            <h3 class="font-weight-bold text-primary">Guru dan Tenaga Pendidik SMK YPC</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Kenali para pengajar yang membimbing siswa menjadi lulusan kompeten dan berakhlak.
            </p>

            <form action="{{ url()->current() }}" method="GET" class="mx-auto" style="max-width: 520px;">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                           class="form-control" placeholder="Cari nama atau mata pelajaran..."
                           aria-label="Cari guru">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" aria-label="Cari">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- DAFTAR GURU --}}
    <div class="container py-5 my-lg-4">
        @if ($data->count() > 0)
            <p class="text-muted mb-4">
                Menampilkan <strong>{{ $data->count() }}</strong> guru
                @if (request('search')) untuk "<strong>{{ request('search') }}</strong>" @endif
            </p>
        @endif

        <div class="row">
            @forelse ($data as $item)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm text-center overflow-hidden" id="cardGuru">
                        @if ($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}"
                                 alt="{{ $item->namaGuru }}"
                                 class="card-img-top w-100"
                                 style="height: 260px; object-fit: cover; object-position: top;"
                                 loading="lazy">
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-gradient-primary text-white-50"
                                 style="height: 260px;">
                                <i class="fas fa-user fa-4x"></i>
                            </div>
                        @endif

                        <div class="card-body px-3 py-4">
                            <h6 class="font-weight-bold text-dark mb-1">{{ $item->namaGuru }}</h6>
                            @if ($item->jabatan ?? null)
                                <span class="badge badge-warning text-white mb-2">{{ $item->jabatan }}</span>
                            @endif
                            @if ($item->mapel ?? null)
                                <p class="small text-muted mb-0">{{ $item->mapel }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    @if (request('search'))
                        Tidak ada guru yang cocok dengan pencarian Anda.
                    @else
                        Belum ada data guru.
                    @endif
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if (method_exists($data, 'hasPages') && $data->hasPages())
            <nav class="d-flex justify-content-center mt-4" aria-label="Navigasi halaman guru">
                {{ $data->onEachSide(1)->appends(request()->query())->links('pagination::bootstrap-4') }}
            </nav>
        @endif
    </div>
@endsection