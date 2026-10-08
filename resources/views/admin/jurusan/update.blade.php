@extends('admin.temp')
@section('title', 'Edit Data Jurusan')
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

                <form class="user w-75 mx-auto my-4" action="{{ route('jurusan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="text-center text-white mb-4">Edit Jurusan</h3>

                    {{-- Nama Jurusan --}}
                    <div class="form-group">
                        <label for="nama" class="text-light">Nama Jurusan</label>
                        <input type="text"
                            class="form-control @error('nama') is-invalid @enderror"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan Nama Jurusan"
                            maxlength="255"
                            value="{{ old('nama', $data->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alias --}}
                    <div class="form-group">
                        <label for="alias" class="text-light">Alias (Singkatan)</label>
                        <input type="text"
                            class="form-control @error('alias') is-invalid @enderror"
                            id="alias"
                            name="alias"
                            placeholder="Contoh: RPL, TKJ, DKV"
                            maxlength="50"
                            value="{{ old('alias', $data->alias) }}" required>
                        @error('alias')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="deskripsi" class="text-light">Deskripsi Jurusan</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi"
                            name="deskripsi"
                            rows="4"
                            placeholder="Masukkan Deskripsi Jurusan" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Materi --}}
                    <div class="form-group">
                        <label for="materi" class="text-light">Materi</label>
                        <textarea class="form-control @error('materi') is-invalid @enderror"
                            id="materi"
                            name="materi"
                            rows="3"
                            placeholder="Masukkan Materi yang Dipelajari" required>{{ old('materi', $data->materi) }}</textarea>
                        @error('materi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Prospek Karier --}}
                    <div class="form-group">
                        <label for="karier" class="text-light">Prospek Karier</label>
                        <textarea class="form-control @error('karier') is-invalid @enderror"
                            id="karier"
                            name="karier"
                            rows="3"
                            placeholder="Masukkan Prospek Karier" required>{{ old('karier', $data->karier) }}</textarea>
                        @error('karier')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group">
                        @if (!empty($data->gambar))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $data->gambar) }}" alt="Gambar Jurusan" style="height:250px"
                                    class="img-thumbnail bg-dark border-secondary">
                            </div>
                        @endif

                        <label for="gambar" class="text-light">Gambar Jurusan</label>
                        <input type="file"
                            class="form-control-file text-light @error('gambar') is-invalid @enderror"
                            id="gambar"
                            name="gambar"
                            accept="image/png, image/jpeg, image/webp">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 5 MB. Kosongkan jika tidak ingin mengganti.</small>
                        @error('gambar')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Logo --}}
                    <div class="form-group">
                        @if (!empty($data->logo))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo Jurusan" style="width:125px"
                                    class="img-thumbnail bg-dark border-secondary">
                            </div>
                        @endif

                        <label for="logo" class="text-light">Logo Jurusan</label>
                        <input type="file"
                            class="form-control-file text-light @error('logo') is-invalid @enderror"
                            id="logo"
                            name="logo"
                            accept="image/png, image/jpeg, image/webp">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB. Kosongkan jika tidak ingin mengganti.</small>
                        @error('logo')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="border-secondary">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection