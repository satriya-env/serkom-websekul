@extends('admin.temp')
@section('title', 'Profil Sekolah')

@push('style')
    <style>
        .dock-nav {
            position: sticky;
            top: 0;
            z-index: 10;
            background: inherit;
            padding: .5rem 0;
        }
        .dock-nav .nav-link {
            color: #adb5bd;
            border-radius: 50rem;
            padding: .35rem 1rem;
            margin-right: .35rem;
            font-size: .9rem;
        }
        .dock-nav .nav-link:hover { color: #fff; }
        .dock-nav .nav-link.active { background: #f6c23e; color: #212529; font-weight: 600; }
        .dock-nav .nav-link:focus-visible { outline: 2px solid #f6c23e; outline-offset: 2px; }
        .profil-pane fieldset { border: 0; padding: 0; margin: 0; min-width: 0; }
        .profil-pane .form-control:disabled { opacity: .85; cursor: default; }
    </style>
@endpush

@section('content')
    @php
        $menu = [
            ['id' => 'sambutan',     'label' => 'Sambutan'],
            ['id' => 'data-sekolah', 'label' => 'Data Sekolah'],
            ['id' => 'sejarah',      'label' => 'Sejarah'],
            ['id' => 'visi-misi',    'label' => 'Visi dan Misi'],
            ['id' => 'lainnya',      'label' => 'Lainnya'],
        ];
        // Tab yang aktif saat halaman dibuka (kembali ke tab terakhir jika validasi gagal)
        $activeSection = old('section', 'sambutan');
    @endphp

    <div class="pb-4">

        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0 pl-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="formProfil" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="section" id="sectionInput" value="{{ $activeSection }}">

            {{-- TOOLBAR --}}
            <div class="d-flex flex-wrap align-items-center justify-content-between my-3">
                <h3 class="mb-0">Profil Sekolah</h3>
                <div>
                    <span id="editStatus" class="badge badge-secondary mr-2 d-none">Mode edit</span>
                    <button type="button" id="btnEdit" class="btn btn-warning btn-sm">Edit</button>
                    <button type="button" id="btnBatal" class="btn btn-outline-secondary btn-sm d-none">Batal</button>
                    <button type="submit" id="btnSimpan" class="btn btn-success btn-sm d-none">Simpan perubahan</button>
                </div>
            </div>

            {{-- DOCK / TAB MENU --}}
            <nav class="dock-nav mb-3" aria-label="Menu profil sekolah">
                <div class="nav" role="tablist">
                    @foreach ($menu as $m)
                        <a href="#{{ $m['id'] }}" class="nav-link" role="tab" data-tab="{{ $m['id'] }}">
                            {{ $m['label'] }}
                        </a>
                    @endforeach
                </div>
            </nav>

            {{-- ===================== SAMBUTAN ===================== --}}
            <div id="sambutan" class="profil-pane d-none" data-title="Sambutan">
                <fieldset disabled>
                    <div class="card bg-dark border-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-lg-2 mb-3">
                                    <p class="small text-muted mb-1">Foto Kepala Sekolah</p>
                                    <img id="previewFotoKepala" src="{{ Storage::url($data->fotoKepala) }}"
                                         alt="Foto Kepala Sekolah" class="img-fluid rounded w-100">
                                    <input type="file" name="fotoKepala" id="fotoKepala" class="d-none"
                                           accept="image/*" data-preview="previewFotoKepala">
                                    <label for="fotoKepala" class="btn btn-warning btn-sm btn-block mt-2 mb-0 edit-only d-none">Ubah gambar</label>
                                </div>

                                <div class="col-md-9 col-lg-10">
                                    <div class="form-group">
                                        <label for="kepalaSekolah">Nama Kepala Sekolah</label>
                                        <input type="text" name="kepalaSekolah" id="kepalaSekolah" class="form-control bg-dark border-dark text-white"
                                               value="{{ old('kepalaSekolah', $data->kepalaSekolah) }}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label for="sambutanText">Sambutan</label>
                                        <textarea name="sambutan" id="sambutanText" rows="10"
                                                  class="form-control bg-dark border-dark text-white">{{ old('sambutan', $data->sambutan) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            {{-- ===================== DATA SEKOLAH ===================== --}}
            <div id="data-sekolah" class="profil-pane d-none" data-title="Data Sekolah">
                <fieldset disabled>
                    <div class="card bg-dark border-dark">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="namaSekolah">Nama Sekolah</label>
                                    <input type="text" name="namaSekolah" id="namaSekolah" class="form-control bg-dark border-dark text-white"
                                           value="{{ old('namaSekolah', $data->namaSekolah) }}">
                                </div>
                                <div class="form-group col-6 col-md-3">
                                    <label for="npsn">NPSN</label>
                                    <input type="text" name="npsn" id="npsn" class="form-control bg-dark border-dark text-white"
                                           value="{{ old('npsn', $data->npsn) }}">
                                </div>
                                <div class="form-group col-6 col-md-3">
                                    <label for="tahunBerdiri">Tahun Berdiri</label>
                                    <input type="number" name="tahunBerdiri" id="tahunBerdiri" class="form-control bg-dark border-dark text-white"
                                           min="1900" max="{{ date('Y') }}"
                                           value="{{ old('tahunBerdiri', $data->tahunBerdiri) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" rows="4"
                                          class="form-control bg-dark border-dark text-white">{{ old('alamat', $data->alamat) }}</textarea>
                            </div>

                            <div class="form-group mb-0">
                                <label for="kontak">Kontak / Telepon</label>
                                <input type="text" name="kontak" id="kontak" class="form-control bg-dark border-dark text-white"
                                       value="{{ old('kontak', $data->kontak) }}">
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            {{-- ===================== SEJARAH ===================== --}}
            <div id="sejarah" class="profil-pane d-none" data-title="Sejarah">
                <fieldset disabled>
                    <div class="card bg-dark border-dark">
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <label for="sejarahText">Sejarah Sekolah</label>
                                <textarea name="sejarah" id="sejarahText" rows="14"
                                          class="form-control bg-dark border-dark text-white">{{ old('sejarah', $data->sejarah) }}</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            {{-- ===================== VISI DAN MISI ===================== --}}
            <div id="visi-misi" class="profil-pane d-none" data-title="Visi dan Misi">
                <fieldset disabled>
                    <div class="card bg-dark border-dark">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="visi">Visi</label>
                                <textarea name="visi" id="visi" rows="4"
                                          class="form-control bg-dark border-dark text-white">{{ old('visi', $data->visi) }}</textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label for="misi">Misi</label>
                                <textarea name="misi" id="misi" rows="9"
                                          class="form-control bg-dark border-dark text-white">{{ old('misi', $data->misi) }}</textarea>
                                <small class="text-muted edit-only d-none">Tulis satu poin misi per baris.</small>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            {{-- ===================== LAINNYA ===================== --}}
            <div id="lainnya" class="profil-pane d-none" data-title="Lainnya">
                <fieldset disabled>
                    <div class="card bg-dark border-dark">
                        <div class="card-body">
                            <div class="row align-items-stretch">
                                {{-- Logo Sekolah --}}
                                <div class="col-sm-5 mb-3 d-flex flex-column">
                                    <p class="small text-muted mb-2">Logo Sekolah</p>
                                    <div class="d-flex align-items-center justify-content-center bg-secondary rounded p-2 flex-grow-1" style="min-height: 150px;">
                                        <img id="previewLogo" src="{{ Storage::url($data->logoSekolah) }}"
                                             alt="Logo Sekolah" class="img-fluid rounded" style="max-height: 120px; object-fit: contain;">
                                    </div>
                                    <input type="file" name="logoSekolah" id="logoSekolah" class="d-none" accept="image/*" data-preview="previewLogo">
                                    <label for="logoSekolah" class="btn btn-warning btn-sm btn-block mt-2 mb-0 edit-only d-none">Ubah logo</label>
                                </div>

                                {{-- Foto Sekolah --}}
                                <div class="col-sm-7 mb-3 d-flex flex-column">
                                    <p class="small text-muted mb-2">Foto Sekolah</p>
                                    <div class="d-flex align-items-center justify-content-center bg-secondary rounded p-2 flex-grow-1" style="min-height: 150px;">
                                        <img id="previewFotoSekolah" src="{{ Storage::url($data->fotoSekolah) }}"
                                             alt="Foto Sekolah" class="img-fluid rounded" style="max-height: 120px; object-fit: cover;">
                                    </div>
                                    <input type="file" name="fotoSekolah" id="fotoSekolah" class="d-none" accept="image/*" data-preview="previewFotoSekolah">
                                    <label for="fotoSekolah" class="btn btn-warning btn-sm btn-block mt-2 mb-0 edit-only d-none">Ubah foto</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 mt-2">
                                <label for="deskripsi">Deskripsi Sekolah</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                          class="form-control bg-dark border-dark text-white">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

        </form>
    </div>

    <script>
        (() => {
            const form       = document.getElementById('formProfil');
            const sectionInp = document.getElementById('sectionInput');
            const btnEdit    = document.getElementById('btnEdit');
            const btnBatal   = document.getElementById('btnBatal');
            const btnSimpan  = document.getElementById('btnSimpan');
            const badge      = document.getElementById('editStatus');
            const tabs       = [...document.querySelectorAll('[data-tab]')];
            const panes      = [...document.querySelectorAll('.profil-pane')];

            // ---------- State ----------
            const validIds   = panes.map(p => p.id);
            let activeId     = '{{ $activeSection }}';
            let isEditing    = false;
            let isDirty      = false;
            let isSubmitting = false;

            // Simpan src awal tiap preview gambar untuk fitur Batal
            const previews = [...form.querySelectorAll('input[type="file"][data-preview]')].map(input => {
                const img = document.getElementById(input.dataset.preview);
                return { input, img, originalSrc: img.src };
            });

            const activePane = () => document.getElementById(activeId);

            // ---------- Mode edit / lihat ----------
            function setEditing(on) {
                isEditing = on;
                const pane = activePane();

                // Hanya field di tab aktif yang bisa diedit & dikirim
                pane.querySelector('fieldset').disabled = !on;
                pane.querySelectorAll('.edit-only').forEach(el => el.classList.toggle('d-none', !on));

                btnEdit.classList.toggle('d-none', on);
                btnBatal.classList.toggle('d-none', !on);
                btnSimpan.classList.toggle('d-none', !on);
                badge.classList.toggle('d-none', !on);

                btnSimpan.textContent = 'Simpan ' + pane.dataset.title.toLowerCase();
            }

            function cancelEditing() {
                form.reset();
                previews.forEach(({ img, originalSrc }) => { img.src = originalSrc; });
                isDirty = false;
                setEditing(false);
            }

            // Minta konfirmasi jika ada perubahan yang belum disimpan
            function confirmDiscard() {
                return !isDirty || confirm('Perubahan yang belum disimpan akan dibuang. Lanjutkan?');
            }

            // ---------- Pindah tab ----------
            function showTab(id) {
                if (!validIds.includes(id)) id = validIds[0];
                activeId = id;
                sectionInp.value = id;

                panes.forEach(p => p.classList.toggle('d-none', p.id !== id));
                tabs.forEach(t => {
                    const on = t.dataset.tab === id;
                    t.classList.toggle('active', on);
                    t.setAttribute('aria-selected', on ? 'true' : 'false');
                });

                history.replaceState(null, '', '#' + id);
                setEditing(false);
            }

            // ---------- Event ----------
            tabs.forEach(tab => tab.addEventListener('click', e => {
                e.preventDefault();
                const id = tab.dataset.tab;
                if (id === activeId) return;
                if (isEditing) {
                    if (!confirmDiscard()) return;
                    cancelEditing();
                }
                showTab(id);
            }));

            btnEdit.addEventListener('click', () => setEditing(true));
            btnBatal.addEventListener('click', () => { if (confirmDiscard()) cancelEditing(); });

            const markDirty = () => { isDirty = true; };
            form.addEventListener('input', markDirty);
            form.addEventListener('change', markDirty);

            previews.forEach(({ input, img }) => {
                input.addEventListener('change', e => {
                    const file = e.target.files[0];
                    if (file) img.src = URL.createObjectURL(file);
                });
            });

            form.addEventListener('submit', () => { isSubmitting = true; });
            window.addEventListener('beforeunload', e => {
                if (isDirty && !isSubmitting) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            // ---------- Inisialisasi ----------
            const hash = location.hash.replace('#', '');
            const hasErrors = {{ $errors->any() ? 'true' : 'false' }};

            // Jika validasi gagal, kembali ke tab yang sedang disimpan; kalau tidak, pakai hash URL
            showTab(hasErrors ? activeId : (validIds.includes(hash) ? hash : activeId));
            if (hasErrors) setEditing(true);
        })();
    </script>
@endsection