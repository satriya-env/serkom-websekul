@extends('temp')
@section('title', 'Form Edit')
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

                <form class="user w-75 mx-auto my-4" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <h3 class="text-center text-white mb-4">Form Data Sekolah</h3>

                    {{--  Input file gambar --}}
                    <div class="form-group">
                        <label for="foto" class="text-light">Foto Sekolah</label>
                        @if(isset($data->foto))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $data->foto) }}" alt="Foto Sekolah" height="80" class="img-thumbnail bg-dark border-secondary">
                            </div>
                        @endif
                        <input type="file" class="form-control-file text-light" id="foto" name="foto" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="logo" class="text-light">Logo Sekolah</label>
                        @if(isset($data->logo))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo Sekolah" height="30" class="img-thumbnail bg-dark border-secondary">
                            </div>
                        @endif
                        <input type="file" class="form-control-file text-light" id="logo" name="logo" accept="image/*">
                    </div>

                    {{-- Nama Sekolah  --}}
                    <div class="form-group">
                        <label for="namaSekolah" class="text-light">Nama Sekolah</label>
                        <input type="text" class="form-control" 
                            id="namaSekolah" 
                            name="namaSekolah" 
                            placeholder="Masukkan Nama Sekolah"
                            value="{{ old('namaSekolah', $data->namaSekolah ?? '') }}" required>
                    </div>

                    {{--  Kepala Sekolah  --}}
                    <div class="form-group">
                        <label for="kepalaSekolah" class="text-light">Kepala Sekolah</label>
                        <input type="text" class="form-control" 
                            id="kepalaSekolah" 
                            name="kepalaSekolah" 
                            placeholder="Nama Kepala Sekolah"
                            value="{{ old('kepalaSekolah', $data->kepalaSekolah ?? '') }}" required>
                    </div>

                    {{--  NPSN  --}}
                    <div class="form-group">
                        <label for="npsn" class="text-light">NPSN</label>
                        <input type="text" class="form-control" 
                            id="npsn" 
                            name="npsn" 
                            placeholder="Nomor Pokok Sekolah Nasional"
                            value="{{ old('npsn', $data->npsn ?? '') }}" required>
                    </div>

                    {{--  Kontak  --}}
                    <div class="form-group">
                        <label for="kontak" class="text-light">Kontak / No. Telepon</label>
                        <input type="text" class="form-control" 
                            id="kontak" 
                            name="kontak" 
                            placeholder="Nomor Telepon/HP"
                            value="{{ old('kontak', $data->kontak ?? '') }}" required>
                    </div>

                    {{--  Tahun Berdiri  --}}
                    <div class="form-group">
                        <label for="tahunBerdiri" class="text-light">Tahun Berdiri</label>
                        <input type="number" class="form-control" 
                            id="tahunBerdiri" 
                            name="tahunBerdiri" 
                            placeholder="Tahun Berdiri (Contoh: 1997)"
                            value="{{ old('tahunBerdiri', $data->tahunBerdiri ?? '') }}" required>
                    </div>

                    {{--  Alamat  --}}
                    <div class="form-group">
                        <label for="alamat" class="text-light">Alamat</label>
                        <textarea class="form-control" 
                            id="alamat" 
                            name="alamat" 
                            rows="3" 
                            placeholder="Alamat Lengkap Sekolah" required>{{ old('alamat', $data->alamat ?? '') }}</textarea>
                    </div>

                    {{--  Visi & Misi  --}}
                    <div class="form-group">
                        <label for="visiMisi" class="text-light">Visi & Misi</label>
                        <textarea class="form-control" 
                            id="visiMisi" 
                            name="visiMisi" 
                            rows="3" 
                            placeholder="Misi / Visi Sekolah" required>{{ old('visiMisi', $data->visiMisi ?? '') }}</textarea>
                    </div>

                    {{--  Deskripsi  --}}
                    <div class="form-group">
                        <label for="deskripsi" class="text-light">Deskripsi</label>
                        <textarea class="form-control" 
                            id="deskripsi" 
                            name="deskripsi" 
                            rows="4" 
                            placeholder="Deskripsi Singkat Sekolah" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                    </div>

                    <hr class="border-secondary">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan Data Sekolah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection