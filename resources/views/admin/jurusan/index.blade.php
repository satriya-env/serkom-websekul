@extends('admin.temp')
@section('title', 'Data Jurusan')
@section('content')
{{-- STYLES --}}
<style>
    a {
        text-decoration: none;
    }
</style>

{{-- CONTENT --}}
<div class="container-fluid bg-dark min-vh-100 py-4">

    {{-- Toolbar: Tambah & Cari --}}
    <div class="row align-items-center mb-4">
        <div class="col-md-6 col-lg-4 my-2">
            <a href="{{ route('jurusan.create') }}" class="btn btn-primary">Tambah data</a>
        </div>

        <div class="col-md-6 col-lg-8 my-2">
            <form action="{{ route('jurusan.index') }}" method="GET" class="form-inline justify-content-md-end">
                <div class="input-group w-100" style="max-width: 400px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari..."
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Daftar Jurusan --}}
    @forelse ($data as $item)
        <div class="card shadow mb-4 border-0" style="background-color: #2c2c2c">
            <div class="p-3">
                <div class="row align-items-start">

                    {{-- Gambar --}}
                    <div class="col-md-4 col-lg-3 text-center">
                        @if ($item->gambar)
                            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->nama }}"
                                class="img-fluid rounded"
                                style="width: 100%; max-height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-light"
                                style="height: 160px;">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    {{-- Informasi --}}
                    <div class="col-md-5 col-lg-6">
                        <div class="d-flex align-items-center my-2">
                            @if ($item->logo)
                                <img src="{{ Storage::url($item->logo) }}" alt="Logo {{ $item->alias }}"
                                    class="rounded mr-3"
                                    style="width: 65px; height: 65px; object-fit: contain; padding: 4px;">
                            @endif
                            <div>
                                <h4 class="font-weight-bold mb-0 text-light">{{ $item->nama }}</h4>
                                <span class="small">{{ $item->alias }}</span>
                            </div>
                        </div>

                        <p class="mb-2 text-light">{{ $item->deskripsi }}</p>
                        <p class="mb-1 text-light"><strong>Materi:</strong> {{ $item->materi }}</p>
                        <p class="mb-0 text-light"><strong>Prospek Karier:</strong> {{ $item->karier }}</p>
                    </div>

                    {{-- Aksi --}}
                    <div class="col-md-3 col-lg-3 text-md-right mt-3 mt-md-0 d-flex justify-content-md-end align-items-center">
                        <a href="{{ route('jurusan.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        <a href="{{ route('jurusan.delete', $item->id) }}" class="btn btn-danger btn-sm mr-2">Hapus</a>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="card shadow border-0" style="background-color: #2c2c2c">
            <div class="p-4 text-center text-light">
                Belum ada data jurusan.
            </div>
        </div>
    @endforelse

</div>
@endsection