@extends('temp')

@push('style')
    <style>
        .recent-card-link {
            display: block;
            text-decoration: none !important;
        }
        .recent-card-link:hover {
            transform: scale(1.1);
        }
    </style>
@endpush

@section('title', 'Dashboard')

@section('content')
    {{-- HEADER: SAPAAN + TOMBOL --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 mt-3">
        <div class="mb-2 mb-sm-0">
            <h2 class="h3 text-white mb-0">
                <span id="sapaan">Halo</span>, {{ auth()->user()->username }}!
            </h2>
            <small class="text-white-50" id="tanggal"></small>
        </div>

        <a href="{{ route('public.home') }}">
            <div class="btn btn-primary">
                Pergi ke Landing Page
            </div>
        </a>
    </div>

    {{-- SECTION CARDS --}}
    <div class="row g-3 mb-4">
        {{-- TOTAL USER --}}
        <div class="col-12 col-sm-6 col-xl-3 mb-2">
            <div class="card border-primary shadow-sm h-100 py-2 bg-dark border-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total User
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalUser }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL SISWA --}}
        <div class="col-12 col-sm-6 col-xl-3 mb-2">
            <div class="card border-primary shadow-sm h-100 py-2 bg-dark border-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Data Siswa
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalSiswa }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- JUMLAH BERITA --}}
        <div class="col-12 col-sm-6 col-xl-3 mb-2">
            <div class="card border-primary shadow-sm h-100 py-2 bg-dark border-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Berita
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalBerita }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TOTAL GURU --}}
        <div class="col-12 col-sm-6 col-xl-3 mb-2">
            <div class="card border-primary shadow-sm h-100 py-2 bg-dark border-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Data Guru
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $totalGuru }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION AKTIVITAS TERBARU --}}
    <h3 class="h4 mb-3 text-white">Aktivitas Terbaru</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 g-3">
        @forelse ($recent as $item)
            {{-- Sembunyikan/Skit kartu jika user BUKAN admin dan item memiliki 'username' --}}
            @if(auth()->check() && auth()->user()->role !== 'Admin' && !empty($item->username))
                @continue
            @endif

            <div class="col">
                <a href="{{ $item->route }}" class="recent-card-link h-100">
                    <div class="card bg-dark text-white border-secondary h-100 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <!-- Tipe Aktivitas -->
                                <span class="badge bg-secondary mb-2"> {{ $item->type }}</span>

                                <!-- Nama / Judul -->
                                <h5 class="card-title h6 text-truncate mb-2" title="{{ $item->namaSiswa ?? $item->username ?? $item->namaGuru }}">
                                    {{ $item->namaSiswa ?? $item->username ?? $item->namaGuru }}
                                </h5>
                            </div>

                            <!-- Waktu Terkait -->
                            <p class="card-text text-white-50 small mb-0 mt-2">
                                <i class="bi bi-clock me-1"></i>
                                {{ $item->updated_at > $item->created_at ? 'Diperbarui' : 'Dibuat' }}
                                {{ optional($item->updated_at > $item->created_at ? $item->updated_at : $item->created_at)->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="card bg-dark border-secondary p-4 text-center">
                    <p class="text-white-50 mb-0">Belum ada aktivitas terbaru.</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection