@extends('admin.temp')
@section('title', 'Tambah Data Eskul')
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

                <form class="user w-75 mx-auto my-4" action="{{ route('eskul.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3 class="text-center text-white mb-4">Form Eskul</h3>

                    {{-- Nama Eskul --}}
                    <div class="form-group">
                        <label for="namaEskul" class="text-light">Nama Eskul</label>
                        <input type="text"
                            class="form-control @error('namaEskul') is-invalid @enderror"
                            id="namaEskul"
                            name="namaEskul"
                            placeholder="Masukkan Nama Ekstrakurikuler"
                            maxlength="40"
                            value="{{ old('namaEskul') }}" required>
                        @error('namaEskul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pembina --}}
                    <div class="form-group">
                        <label for="pembina" class="text-light">Nama Pembina</label>
                        <input type="text"
                            class="form-control @error('pembina') is-invalid @enderror"
                            id="pembina"
                            name="pembina"
                            placeholder="Masukkan Nama Pembina"
                            maxlength="40"
                            value="{{ old('pembina') }}" required>
                        @error('pembina')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="deskripsi" class="text-light">Deskripsi Eskul</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi"
                            name="deskripsi"
                            rows="4"
                            placeholder="Masukkan Deskripsi Ekstrakurikuler" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Jadwal Latihan --}}
                    <div class="form-group">
                        <label for="jadwalLatihan" class="text-light">Jadwal Latihan</label>
                        <select class="form-control @error('jadwalLatihan') is-invalid @enderror"
                            id="jadwalLatihan" name="jadwalLatihan" required>
                            <option value="">-- Pilih Jadwal Latihan --</option>
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                                <option value="{{ $hari }}" {{ old('jadwalLatihan') == $hari ? 'selected' : '' }}>
                                    {{ $hari }}
                                </option>
                            @endforeach
                        </select>
                        @error('jadwalLatihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group">
                        <label for="gambar" class="text-light">Gambar Eskul</label>
                        <input type="file"
                            class="form-control-file text-light @error('gambar') is-invalid @enderror"
                            id="gambar"
                            name="gambar"
                            accept="image/png, image/jpeg, image/jpg">
                        <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 5 MB.</small>
                        @error('gambar')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="border-secondary">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection