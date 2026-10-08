@extends('admin.temp')
@section('title', 'Data Galeri')
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

    /* THUMBNAIL (foto & video) */
    .thumb-wrap {
        position: relative;
        display: block;
        width: 100%;
        height: 160px;
        border-radius: .25rem;
        overflow: hidden;
        background: #000;
    }
    .thumb-wrap img,
    .thumb-wrap video {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
    }
    .thumb-play {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 44px;
        height: 44px;
        margin: -22px 0 0 -22px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(220, 53, 69, .95);
        color: #fff;
        font-size: 1rem;
        pointer-events: none;
    }
</style>

{{-- CONTENT --}}
    <div class="row">
        <div class="col-lg-6 my-4">
            <a href="{{route('galeri.create')}}" class="btn btn-primary">Tambah data</a>
        </div>
    </div>
    @foreach ($data as $item)
        <div class="card shadow mb-4 border-0" style="background-color: #2c2c2c">
            <div class="p-3">
                <div class="row align-items-start">
                    <div class="col-md-4 col-lg-3 text-center">
                        <div class="thumb-wrap">
                            @if ($item->kategori === 'Video')
                                {{-- #t=0.5 agar browser menampilkan frame awal sebagai thumbnail --}}
                                <video src="{{ Storage::url($item->file) }}#t=0.5" preload="metadata" muted playsinline></video>
                            @else
                                <img src="{{ Storage::url($item->file) }}" alt="Thumbnail">
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-5 col-lg-6">
                        <h4 class="font-weight-bold my-2 text-light">{{ $item->judul }}</h4>
                        <p class="small mb-4 text-grey-200">{{$item->tanggal}} | {{ $item->kategori }}</p>
                        <p class="mb-0 text-light">{{ $item->keterangan }}</p>
                    </div>
                    
                    <div class="col-md-3 col-lg-3 text-md-right mt-3 mt-md-0 d-flex justify-content-md-end align-items-center">
                        <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        <a href="{{ route('galeri.delete', $item->id)}}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus Data {{$item->judul}}?')">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
@endsection