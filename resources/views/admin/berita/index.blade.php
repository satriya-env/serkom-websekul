@extends('temp')
@section('title', 'Data Berita')
@section('content')
{{-- STYLES --}}
<style>
    #tableSiswa{
        border: 1px solid;
        border-color: #4d4d4d !important;
    }
    a{
        text-decoration: none
    }
</style>

{{-- CONTENT --}}
    <div class="row">
        <div class="col-lg-6 my-4">
            <a href="{{route('berita.create')}}" class="btn btn-primary">Tambah data</a>
        </div>
    </div>
    @foreach ($data as $item)
        <div class="card shadow mb-4 border-0" style="background-color: #2c2c2c">
            <div class="p-3">
                <div class="row align-items-start">
                    <div class="col-md-4 col-lg-3 text-center">
                        <img src="{{ Storage::url($item->gambar) }}" alt="Thumbnail" class="img-fluid rounded" style="width: 100%; max-height: 160px; object-fit: cover;">
                    </div>
                    
                    <div class="col-md-5 col-lg-6">
                        <h4 class="font-weight-bold my-2 text-light">{{ $item->judul }}</h4>
                        <p class="small mb-4 text-grey-200">{{ $item->status }} | {{ $item->tanggal}}</p>
                        <p class="mb-0 text-light">{{ $item->isi }}</p>
                    </div>
                    
                    <div class="col-md-3 col-lg-3 text-md-right mt-3 mt-md-0 d-flex justify-content-md-end align-items-center">
                        <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2"></i> Edit</a>
                        <a href="{{ route('berita.delete', $item->id)}}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus Data {{$item->judul}}?')">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection