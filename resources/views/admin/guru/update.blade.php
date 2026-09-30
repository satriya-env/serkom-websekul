@extends('temp')
@section('title', 'Edit Data')
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
            <form class="user w-50 mx-auto my-5" action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3 class="text-center">Form Guru</h3>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="nip" 
                        name="nip" 
                        maxlength="15"
                        placeholder="nip"
                        value="{{ old('nip', $guru->nip) }}" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="namaGuru" 
                        name="namaGuru" 
                        placeholder="Nama Guru"
                        value="{{ old('namaGuru', $guru->namaGuru) }}" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="mapel" 
                        name="mapel" 
                        placeholder="Mata Pelajaran"
                        value="{{ old('mapel', $guru->mapel) }}" required>
                </div>

                <div class="form-group">
                    <label for="foto" class="text-light">Foto Guru</label>
                    @if(isset($guru->foto))
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto Guru" height="80" class="img-thumbnail bg-dark border-secondary">
                        </div>
                    @endif
                    <input type="file" class="form-control-file text-light" id="foto" name="foto" accept="image/*">
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        

    </div>
@endsection