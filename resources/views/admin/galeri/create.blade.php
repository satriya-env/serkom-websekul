@extends('temp')
@section('title', 'Tambah Data')
@section('content')
    <div class="container-fluid bg-dark min-vh-100 py-5">
        <div class="card bg-dark text-white mx-auto w-75 border-secondary shadow">
            <div class="card-body">

                {{-- Alert Error Validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="user w-75 mx-auto my-4" action="{{route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3 class="text-center text-white mb-4">{{ 'Form Galeri' }}</h3>

                    {{-- Judul Galeri --}}
                    <div class="form-group">
                        <label for="judul" class="text-light">Judul</label>
                        <input type="text" class="form-control" 
                            id="judul" 
                            name="judul" 
                            placeholder="Masukkan Judul Galeri"
                            value="{{ old('judul') }}" required>
                    </div>

                    {{-- Kategori (Enum: Foto / Video) --}}
                    <div class="form-group">
                        <label for="kategori" class="text-light">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Foto" {{ old('kategori') == 'Foto' ? 'selected' : '' }}>Foto</option>
                            <option value="Video" {{ old('kategori') == 'Video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    {{-- Tanggal --}}
                    <div class="form-group">
                        <label for="tanggal" class="text-light">Tanggal</label>
                        <input type="date" class="form-control" 
                            id="tanggal" 
                            name="tanggal" 
                            value="{{ old('tanggal')}}" required>
                    </div>

                    {{-- Input File --}}
                    <div class="form-group">
                        <label for="file" class="text-light">File Media (Gambar/Video)</label>
                        @if(isset($data->file))
                            <div class="mb-2">
                                @if($data->kategori == 'Foto')
                                    <img src="{{ asset('storage/' . $data->file) }}" alt="Preview Galeri" height="100" class="img-thumbnail bg-dark border-secondary">
                                @else
                                    <a href="{{ asset('storage/' . $data->file) }}" target="_blank" class="btn btn-sm btn-info">Lihat Video Saat Ini</a>
                                @endif
                            </div>
                        @endif
                        <input type="file" class="form-control-file text-light" id="file" name="file" {{ isset($galeri) ? '' : 'required' }}>
                    </div>

                    {{-- Keterangan --}}
                    <div class="form-group">
                        <label for="keterangan" class="text-light">Keterangan</label>
                        <textarea class="form-control" 
                            id="keterangan" 
                            name="keterangan" 
                            rows="4" 
                            placeholder="Keterangan singkat tentang media..." required>{{ old('keterangan') }}</textarea>
                    </div>

                    <hr class="border-secondary">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection