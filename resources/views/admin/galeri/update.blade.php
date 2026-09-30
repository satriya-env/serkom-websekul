@extends('temp')
@section('title', 'Edit Data')
@section('content')    
    <div class="container-fluid bg-dark min-vh-100 py-5">

        <div class="card bg-dark text-white mx-auto w-75 border-secondary shadow">
            <div class="card-body">
                
                {{-- Alert Notifikasi Sukses --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

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

                <form class="user w-75 mx-auto my-4" action="{{ route('galeri.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="text-center text-white mb-4">Form Edit Galeri</h3>

                    {{-- Judul Galeri --}}
                    <div class="form-group">
                        <label for="judul" class="text-light">Judul</label>
                        <input type="text" class="form-control" 
                            id="judul" 
                            name="judul" 
                            placeholder="Masukkan Judul Galeri"
                            value="{{ old('judul', $data->judul) }}" required>
                    </div>

                    {{-- Kategori (Enum: Foto / Video) --}}
                    <div class="form-group">
                        <label for="kategori" class="text-light">Kategori</label>
                        <select class="form-control" id="kategori" name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Foto" {{ old('kategori', $data->kategori) == 'Foto' ? 'selected' : '' }}>Foto</option>
                            <option value="Video" {{ old('kategori', $data->kategori) == 'Video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    {{-- Tanggal --}}
                    <div class="form-group">
                        <label for="tanggal" class="text-light">Tanggal</label>
                        <input type="date" class="form-control" 
                            id="tanggal" 
                            name="tanggal" 
                            value="{{ old('tanggal', $data->tanggal) }}" required>
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
                        {{-- Dihilangkan 'required'-nya agar tidak wajib diunggah ulang saat update --}}
                        <input type="file" class="form-control-file text-light" id="file" name="file">
                    </div>

                    {{-- Keterangan --}}
                    <div class="form-group">
                        <label for="keterangan" class="text-light">Keterangan</label>
                        <textarea class="form-control" 
                            id="keterangan" 
                            name="keterangan" 
                            rows="4" 
                            placeholder="Keterangan singkat tentang media..." required>{{ old('keterangan', $data->keterangan) }}</textarea>
                    </div>

                    <hr class="border-secondary">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection