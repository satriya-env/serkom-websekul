@extends('admin.temp')

@push('style')
    <style>
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .stat-card {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem;
            border-radius: .5rem;
            transition: transform .15s ease;
            border: 1px solid var(--bs-dark, #343a40);
        }
        .stat-card:hover {
            transform: translateY(-2px);
        }
        .stat-label {
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: .25rem;
        }
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: #fff;
        }
        .stat-icon {
            font-size: 1.75rem;
            opacity: .45;
            flex-shrink: 0;
        }

        /* Daftar berita */
        .news-item {
            padding: .85rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }
        .news-item:last-child {
            border-bottom: 0;
        }
        .news-title {
            font-size: 1rem;
            margin-bottom: .15rem;
            color: #fff;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        @media (max-width: 575.98px) {
            .stat-card { padding: 1rem; }
            .stat-value { font-size: 1.25rem; }
        }
    </style>
@endpush

@section('title', 'Dashboard')

@section('content')
    {{-- HEADER --}}
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 mt-3" style="gap: .75rem;">
        <div>
            <h2 class="h3 text-white mb-0">
                <span >Halo</span>, {{ auth()->user()->username }}!
            </h2>
        </div>

        <a href="{{ route('public.home') }}" class="btn btn-primary align-self-start align-self-sm-auto">
            Pergi ke Landing Page
        </a>
    </div>

    {{-- STATISTIK --}}
    @php
        $stats = [
            ['label' => 'Total User',            'value' => $totalUser,   'icon' => 'fa-user'],
            ['label' => 'Total Data Siswa',      'value' => $totalSiswa,  'icon' => 'fa-user-graduate'],
            ['label' => 'Total Data Guru',       'value' => $totalGuru,   'icon' => 'fa-chalkboard-teacher'],
            ['label' => 'Jumlah Berita',         'value' => $totalBerita, 'icon' => 'fa-newspaper'],
            ['label' => 'Total Ekstrakulikuler', 'value' => $totalEskul,  'icon' => 'fa-futbol'],
        ];
    @endphp

    <div class="stat-grid">
        @foreach ($stats as $stat)
            <div class="stat-card bg-dark border-dark">
                <div class="min-w-0">
                    <div class="stat-label text-secondary">{{ $stat['label'] }}</div>
                    <div class="stat-value">{{ $stat['value'] }}</div>
                </div>
                <i class="fas {{ $stat['icon'] }} stat-icon text-white"></i>
            </div>
        @endforeach
    </div>

    {{-- KONTEN --}}
    <div class="row">
        {{-- BARU DITAMBAHKAN --}}
        <div class="col-12 col-lg-6 mb-4 d-flex flex-column">
            <h3 class="h5 text-light mb-3">Baru Ditambahkan</h3>
            <div class="card bg-dark border-dark px-3 py-2 flex-grow-1">
                @forelse ($recent as $item)
                    @if(auth()->user()->role !== 'Admin' && !empty($item->username))
                        @continue
                    @endif
                    <div class="news-item">
                        <span class="badge bg-secondary text-white mb-2">{{$item->type}}</span>
                        <h5 class="news-title">{{ 
                            $item->username 
                            ?? $item->namaSiswa 
                            ?? $item->namaGuru
                            ?? $item->namaEskul
                        }}</h5>
                        <span class="small">
                            {{ $item->updated_at > $item->created_at ? 'Diperbarui' : 'Dibuat' }}
                            {{ $item->updated_at->diffForHumans() }}
                        </span>
                    </div>
                @empty
                    <p class="text-white-50 my-3">Belum ada berita. Tambahkan berita pertama dari menu Berita.</p>
                @endforelse
            </div>
        </div>
        {{-- BERITA TERBARU --}}
        <div class="col-12 col-lg-6 mb-4 d-flex flex-column">
            <h3 class="h5 text-light mb-3">Berita Terbaru</h3>
            <div class="card bg-dark border-dark px-3 py-2 flex-grow-1">
                @forelse ($berita as $item)
                    <div class="news-item">
                        <div class="row mx-2">
                            <img src="{{ Storage::url($item->gambar) }}" 
                                alt="{{ $item->judul }}" 
                                style="width: 85px; height: 85px; object-fit: cover; border-radius: 10%;">
                            <div class="col">
                                <span class="badge text-white mb-2 {{ $item->status == 'Draf' ? 'bg-primary' : ($item->status == 'Publish' ? 'bg-success' : 'bg-secondary') }}">
                                    {{ $item->status }}
                                </span>
                                <h5 class="news-title">{{ $item->judul }}</h5>
                                <span class="small text-white-50">
                                    {{ $item->updated_at > $item->created_at ? 'Diperbarui' : 'Dibuat' }}
                                    {{ $item->updated_at->diffForHumans() }}, Oleh {{ $item->user->username }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-white-50 my-3">Belum ada berita. Tambahkan berita pertama dari menu Berita.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection