@extends('public.temp')

@section('title', 'Daftar Siswa - SMK YPC Tasikmalaya')

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
            <span class="small font-weight-bold text-warning d-block pt-5">PARA PELAJAR</span>
            <h1 class="font-weight-bold m-0">Daftar Siswa</h1>
            <nav aria-label="breadcrumb" class="p-0 m-0">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ route('public.home') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Daftar Siswa</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-fluid py-5 bg-gray-200">
        <div class="container text-center pt-2">
            <h3 class="font-weight-bold text-primary">Para Pelajar Hebat</h3>
            <p class="mx-auto mb-4" style="max-width: 700px;">
                Data Pelajar yang telah bersekolah di SMK YPC Tasikmalaya
            </p>

            <form action="{{ url()->current() }}" method="GET" class="mx-auto" style="max-width: 520px;">
                <div class="input-group">
                    <input type="search" name="search" value="{{ request('search') }}"
                           class="form-control" placeholder="Cari nama siswa..."
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
    <div class="container my-5">
        <div class="table-responsive mx-auto rounded" id="tableSiswa">
            <table class="table mb-0text-nowrap" id="dataTable" style="min-width: 650px;">
                <thead class="text-light bg-primary">
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tahun Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $item)
                        <tr>
                            <td>{{$item->namaSiswa}}</td>
                            <td>{{$item->kelas}}</td>
                            <td>{{$item->tahunMasuk}}</td>
                        </tr>    
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Database masih kosong...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection