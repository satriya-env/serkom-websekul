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

                <form id="formEskul" class="user w-75 mx-auto my-4" action="{{ route('eskul.store') }}"
                    method="POST" enctype="multipart/form-data" novalidate>
                    @csrf

                    <h3 class="text-center text-white mb-4">Form Eskul</h3>

                    {{-- Nama Eskul --}}
                    <div class="form-group">
                        <label for="namaEskul" class="text-light">Nama Eskul</label>
                        <input type="text"
                            class="form-control @error('namaEskul') is-invalid @enderror"
                            id="namaEskul" name="namaEskul"
                            placeholder="Masukkan Nama Ekstrakurikuler"
                            maxlength="40" value="{{ old('namaEskul') }}" required>
                        @error('namaEskul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Pembina --}}
                    <div class="form-group">
                        <label for="guruSearch" class="text-light">Nama Pembina</label>

                        <div class="position-relative" id="guruWrapper">
                            <input type="hidden" name="idGuru" id="idGuru" value="{{ old('idGuru') }}">

                            {{-- Input pencarian --}}
                            <input type="text"
                                class="form-control @error('idGuru') is-invalid @enderror"
                                id="guruSearch"
                                placeholder="Ketik untuk mencari guru..."
                                autocomplete="off"
                                value="{{ optional($guru->firstWhere('id', old('idGuru')))->namaGuru }}">

                            {{-- Daftar guru --}}
                            <div class="dropdown-menu bg-dark w-100 shadow border-secondary"
                                id="guruList" style="max-height: 220px; overflow-y: auto;">
                                @foreach ($guru as $g)
                                    <button type="button"
                                        class="dropdown-item text-light guru-item"
                                        data-id="{{ $g->id }}"
                                        data-nama="{{ $g->namaGuru }}">
                                        {{ $g->namaGuru }}
                                    </button>
                                @endforeach
                                <span class="dropdown-item-text text-muted d-none" id="guruKosong">
                                    Guru tidak ditemukan
                                </span>
                            </div>

                            <div class="invalid-feedback" id="guruError">
                                @error('idGuru') {{ $message }} @else Silakan pilih guru pembina. @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="deskripsi" class="text-light">Deskripsi Eskul</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                            id="deskripsi" name="deskripsi" rows="4"
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
                            id="gambar" name="gambar" accept="image/png, image/jpeg, image/jpg">
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

    {{-- Hover item dropdown (gelap) --}}
    <style>
        #guruList .guru-item:hover,
        #guruList .guru-item:focus {
            background-color: #4e73df;
            color: #fff;
        }
    </style>

    {{-- JavaScript murni --}}
    <script>
        (function () {
            const wrapper  = document.getElementById('guruWrapper');
            const search   = document.getElementById('guruSearch');
            const hidden   = document.getElementById('idGuru');
            const list     = document.getElementById('guruList');
            const kosong   = document.getElementById('guruKosong');
            const items    = list.querySelectorAll('.guru-item');
            const form     = document.getElementById('formEskul');
            let namaTerpilih = search.value;

            function buka()  { list.classList.add('show'); }
            function tutup() { list.classList.remove('show'); }

            function filter() {
                const kata = search.value.toLowerCase().trim();
                let ada = false;
                items.forEach(function (item) {
                    const cocok = item.dataset.nama.toLowerCase().includes(kata);
                    item.classList.toggle('d-none', !cocok);
                    if (cocok) ada = true;
                });
                kosong.classList.toggle('d-none', ada);
            }

            // Buka daftar saat input difokuskan
            search.addEventListener('focus', function () {
                search.select();
                filter();
                buka();
            });

            // Filter saat mengetik
            search.addEventListener('input', function () {
                // Kalau teks diubah, anggap pilihan sebelumnya batal
                hidden.value = '';
                search.classList.remove('is-invalid');
                filter();
                buka();
            });

            // Pilih guru
            items.forEach(function (item) {
                item.addEventListener('click', function () {
                    hidden.value = item.dataset.id;
                    search.value = item.dataset.nama;
                    namaTerpilih = item.dataset.nama;
                    search.classList.remove('is-invalid');
                    tutup();
                });
            });

            // Klik di luar: tutup daftar, kembalikan teks ke guru terpilih
            document.addEventListener('click', function (e) {
                if (!wrapper.contains(e.target)) {
                    tutup();
                    search.value = hidden.value ? namaTerpilih : '';
                }
            });

            // Tombol Escape menutup daftar
            search.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') tutup();
            });

            // Validasi sebelum submit: guru wajib dipilih
            form.addEventListener('submit', function (e) {
                if (!hidden.value) {
                    e.preventDefault();
                    search.classList.add('is-invalid');
                    document.getElementById('guruError').style.display = 'block';
                    search.focus();
                }
            });
        })();
    </script>
@endsection