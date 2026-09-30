@extends('temp')
@section('title', 'Tambah Data')
@section('content')
    <div class="container-fluid bg-dark min-vh-100 py-5">
        <div class="card bg-dark mx-auto w-75">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="user w-50 mx-auto my-5" action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3 class="text-center">Form Guru</h3>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="nip" 
                        name="nip" 
                        maxlength="15"
                        placeholder="nip"
                        value="{{ old('nip') }}" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="namaGuru" 
                        name="namaGuru" 
                        placeholder="Nama Guru"
                        value="{{ old('namaGuru') }}" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="mapel" 
                        name="mapel" 
                        placeholder="Mata Pelajaran"
                        value="{{ old('mapel') }}" required>
                </div>

                <div class="form-group">
                    <label for="foto" class="text-light">Foto Guru</label>
                    
                    <!-- Container Preview Gambar -->
                    <div id="previewContainer" class="mb-2" style="{{ isset($guru->foto) ? 'display: block;' : 'display: none;' }}">
                        <img id="preview" 
                            src="{{ isset($guru->foto) ? asset('storage/' . $guru->foto) : '#' }}" 
                            alt="Foto Guru" 
                            height="80" 
                            class="img-thumbnail bg-dark border-secondary">
                    </div>

                    <input type="file" class="form-control-file text-light" id="foto" name="foto" accept="image/*" onchange="previewImage(event)">
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        

    </div>
@endsection