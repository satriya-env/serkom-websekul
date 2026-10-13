@extends('admin.temp')
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
                    <label for="guruSearch" class="text-light">Mata Pelajaran</label>

                    <div class="position-relative" id="guruWrapper">
                        <input type="hidden" name="idMapel" id="idMapel" value="{{ old('idMapel') }}">

                        {{-- Input pencarian --}}
                        <input type="text"
                            class="form-control @error('idMapel') is-invalid @enderror"
                            id="guruSearch"
                            placeholder="Ketik untuk mencari Mapel..."
                            autocomplete="off"
                            value="{{ optional($mapel->firstWhere('id', old('idMapel')))->pelajaran }}">

                        {{-- Daftar guru --}}
                        <div class="dropdown-menu bg-dark w-100 shadow border-secondary"
                            id="guruList" style="max-height: 220px; overflow-y: auto;">
                            @foreach ($mapel as $g)
                                <button type="button"
                                    class="dropdown-item text-light guru-item"
                                    data-id="{{ $g->id }}"
                                    data-nama="{{ $g->pelajaran }}">
                                    {{ $g->pelajaran }}
                                </button>
                            @endforeach
                            <span class="dropdown-item-text text-muted d-none" id="guruKosong">
                                Mapel tidak ditemukan
                            </span>
                        </div>

                        <div class="invalid-feedback" id="guruError">
                            @error('idMapel') {{ $message }} @else Silakan pilih Mapel. @enderror
                        </div>
                    </div>
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
    <script>
        (function () {
            const wrapper  = document.getElementById('guruWrapper');
            const search   = document.getElementById('guruSearch');
            const hidden   = document.getElementById('idMapel');
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