@extends('admin.temp')
@section('title', 'Profil Sekolah')

@php
    // id tab => label
    $menu = [
        'sambutan'     => 'Sambutan',
        'data-sekolah' => 'Data Sekolah',
        'sejarah'      => 'Sejarah',
        'visi-misi'    => 'Visi dan Misi',
        'lainnya'      => 'Lainnya',
    ];

    $aktif = old('section', session('section', 'sambutan'));
    if (!isset($menu[$aktif])) $aktif = 'sambutan';

    // Misi: satu baris = satu poin
    $misiList = array_filter(array_map('trim', preg_split('/\R/', (string) $data->misi)));
@endphp

@push('style')
<style>
    .dock-nav { 
        position: sticky; 
        top: 0; 
        z-index: 10; background: inherit; 
        padding: .5rem 0; 
    }
    .dock-nav .nav-link { 
        color: #adb5bd; 
        font-size: .9rem; 
        margin-right: .35rem; 
        padding: .35rem 1rem; 
    }
    .dock-nav .nav-link.active { 
        background: #1a2b88; 
        color: #adb5bd; 
        font-weight: 600; 
    }

    .teks-panjang { 
        white-space: pre-line; 
    }
    dt { 
        color: #adb5bd; 
        font-weight: 500; 
    }

    .img-box { 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        min-height: 150px; 
        padding: .5rem; 
        background: #6c757d; 
        border-radius: .25rem; 
    }
    .img-box img { 
        max-height: 120px; 
    }

    .modal-edit .modal-content { 
        background: #343a40; 
        color: #fff; 
        border: 0; }
    .modal-edit .modal-header, .modal-edit .modal-footer { 
        border-color: #495057; 
    }
    .modal-edit .close { 
        color: #fff; 
        text-shadow: none; 
        opacity: .7; }
    .modal-edit .form-control { 
        background: #212529; 
        border-color: #495057; 
        color: #fff; 
    }
    .modal-edit .form-control:focus { 
        border-color: #f6c23e; 
        box-shadow: none; 
    }
</style>
@endpush

@section('content')
<div class="pb-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <h3 class="my-3">Profil Sekolah</h3>

    {{-- ===== MENU TAB ===== --}}
    <nav class="dock-nav mb-3">
        <div class="nav nav-pills">
            @foreach ($menu as $id => $label)
                <a href="#{{ $id }}" data-toggle="pill"
                   class="nav-link {{ $aktif === $id ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>
    </nav>

    {{-- ===== ISI TAB ===== --}}
    <div class="tab-content">

        {{-- Sambutan --}}
        <div id="sambutan" class="tab-pane fade {{ $aktif === 'sambutan' ? 'show active' : '' }}">
            <div class="card bg-dark text-white border-dark">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark border-dark">
                    <h5 class="mb-0">Sambutan</h5>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-sambutan">Edit</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-2 mb-3">
                            <img src="{{ Storage::url($data->fotoKepala) }}" class="img-fluid rounded w-100" alt="Foto Kepala Sekolah">
                        </div>
                        <div class="col-md-9 col-lg-10">
                            <p class="small text-muted mb-0">Kepala Sekolah</p>
                            <h5>{{ $data->kepalaSekolah }}</h5>
                            <div class="teks-panjang">{{ $data->sambutan }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Sekolah --}}
        <div id="data-sekolah" class="tab-pane fade {{ $aktif === 'data-sekolah' ? 'show active' : '' }}">
            <div class="card bg-dark text-white border-dark">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark border-dark">
                    <h5 class="mb-0">Data Sekolah</h5>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-data-sekolah">Edit</button>
                </div>
                <div class="card-body">
                    <dl class="row mb-0">
                        <dt class="col-sm-3">Nama Sekolah</dt>   <dd class="col-sm-9">{{ $data->namaSekolah }}</dd>
                        <dt class="col-sm-3">NPSN</dt>           <dd class="col-sm-9">{{ $data->npsn }}</dd>
                        <dt class="col-sm-3">Tahun Berdiri</dt>  <dd class="col-sm-9">{{ $data->tahunBerdiri }}</dd>
                        <dt class="col-sm-3">Alamat</dt>         <dd class="col-sm-9 teks-panjang">{{ $data->alamat }}</dd>
                        <dt class="col-sm-3">Kontak</dt>         <dd class="col-sm-9 mb-0">{{ $data->kontak }}</dd>
                    </dl>
                </div>
            </div>
        </div>

        {{-- Sejarah --}}
        <div id="sejarah" class="tab-pane fade {{ $aktif === 'sejarah' ? 'show active' : '' }}">
            <div class="card bg-dark text-white border-dark">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark border-dark">
                    <h5 class="mb-0">Sejarah Sekolah</h5>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-sejarah">Edit</button>
                </div>
                <div class="card-body teks-panjang">{{ $data->sejarah }}</div>
            </div>
        </div>

        {{-- Visi dan Misi --}}
        <div id="visi-misi" class="tab-pane fade {{ $aktif === 'visi-misi' ? 'show active' : '' }}">
            <div class="card bg-dark text-white border-dark">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark border-dark">
                    <h5 class="mb-0">Visi dan Misi</h5>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-visi-misi">Edit</button>
                </div>
                <div class="card-body">
                    <h6 class="text-muted">Visi</h6>
                    <p class="teks-panjang">{{ $data->visi }}</p>

                    <h6 class="text-muted mt-4">Misi</h6>
                    <ol class="pl-3 mb-0">
                        @foreach ($misiList as $poin)
                            <li>{{ $poin }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>

        {{-- Lainnya --}}
        <div id="lainnya" class="tab-pane fade {{ $aktif === 'lainnya' ? 'show active' : '' }}">
            <div class="card bg-dark text-white border-dark">
                <div class="card-header d-flex justify-content-between align-items-center bg-dark border-dark">
                    <h5 class="mb-0">Lainnya</h5>
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-lainnya">Edit</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5 mb-3">
                            <p class="small text-muted mb-2">Logo Sekolah</p>
                            <div class="img-box">
                                <img src="{{ Storage::url($data->logoSekolah) }}" class="img-fluid" style="object-fit: contain" alt="Logo">
                            </div>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <p class="small text-muted mb-2">Foto Sekolah</p>
                            <div class="img-box">
                                <img src="{{ Storage::url($data->fotoSekolah) }}" class="img-fluid" style="object-fit: cover" alt="Foto Sekolah">
                            </div>
                        </div>
                    </div>
                    <p class="small text-muted mb-1">Deskripsi Sekolah</p>
                    <div class="teks-panjang">{{ $data->deskripsi }}</div>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- Sambutan --}}
<div class="modal fade modal-edit" id="modal-sambutan" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="hidden" name="section" value="sambutan">

            <div class="modal-header">
                <h5 class="modal-title">Edit Sambutan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && $aktif === 'sambutan')
                    <div class="alert alert-danger"><ul class="mb-0 pl-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                @endif

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <p class="small text-muted mb-1">Foto Kepala Sekolah</p>
                        <img id="preview-fotoKepala" src="{{ Storage::url($data->fotoKepala) }}" class="img-fluid rounded w-100" alt="">
                        <input type="file" name="fotoKepala" id="fotoKepala" class="d-none" accept="image/*">
                        <label for="fotoKepala" class="btn btn-warning btn-sm btn-block mt-2 mb-0">Ubah gambar</label>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Nama Kepala Sekolah</label>
                            <input type="text" name="kepalaSekolah" class="form-control" value="{{ old('kepalaSekolah', $data->kepalaSekolah) }}">
                        </div>
                        <div class="form-group mb-0">
                            <label>Sambutan</label>
                            <textarea name="sambutan" rows="10" class="form-control">{{ old('sambutan', $data->sambutan) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Simpan sambutan</button>
            </div>
        </form>
    </div>
</div>

{{--Data Sekolah --}}
<div class="modal fade modal-edit" id="modal-data-sekolah" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content" action="{{ route('profil.update') }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="section" value="data-sekolah">

            <div class="modal-header">
                <h5 class="modal-title">Edit Data Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && $aktif === 'data-sekolah')
                    <div class="alert alert-danger"><ul class="mb-0 pl-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                @endif

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nama Sekolah</label>
                        <input type="text" name="namaSekolah" class="form-control" value="{{ old('namaSekolah', $data->namaSekolah) }}">
                    </div>
                    <div class="form-group col-6 col-md-3">
                        <label>NPSN</label>
                        <input type="text" name="npsn" class="form-control" value="{{ old('npsn', $data->npsn) }}">
                    </div>
                    <div class="form-group col-6 col-md-3">
                        <label>Tahun Berdiri</label>
                        <input type="number" name="tahunBerdiri" class="form-control" min="1900" max="{{ date('Y') }}"
                               value="{{ old('tahunBerdiri', $data->tahunBerdiri) }}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="4" class="form-control">{{ old('alamat', $data->alamat) }}</textarea>
                </div>
                <div class="form-group mb-0">
                    <label>Kontak / Telepon</label>
                    <input type="text" name="kontak" class="form-control" value="{{ old('kontak', $data->kontak) }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Simpan data sekolah</button>
            </div>
        </form>
    </div>
</div>

{{--  Sejarah --}}
<div class="modal fade modal-edit" id="modal-sejarah" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content" action="{{ route('profil.update') }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="section" value="sejarah">

            <div class="modal-header">
                <h5 class="modal-title">Edit Sejarah</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && $aktif === 'sejarah')
                    <div class="alert alert-danger"><ul class="mb-0 pl-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                @endif

                <div class="form-group mb-0">
                    <label>Sejarah Sekolah</label>
                    <textarea name="sejarah" rows="14" class="form-control">{{ old('sejarah', $data->sejarah) }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Simpan sejarah</button>
            </div>
        </form>
    </div>
</div>

{{-- Visi dan Misi --}}
<div class="modal fade modal-edit" id="modal-visi-misi" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content" action="{{ route('profil.update') }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="section" value="visi-misi">

            <div class="modal-header">
                <h5 class="modal-title">Edit Visi dan Misi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && $aktif === 'visi-misi')
                    <div class="alert alert-danger"><ul class="mb-0 pl-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                @endif

                <div class="form-group">
                    <label>Visi</label>
                    <textarea name="visi" rows="4" class="form-control">{{ old('visi', $data->visi) }}</textarea>
                </div>
                <div class="form-group mb-0">
                    <label>Misi</label>
                    <textarea name="misi" rows="9" class="form-control">{{ old('misi', $data->misi) }}</textarea>
                    <small class="text-muted">Tulis satu poin misi per baris.</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Simpan visi dan misi</button>
            </div>
        </form>
    </div>
</div>

{{-- Lainnya --}}
<div class="modal fade modal-edit" id="modal-lainnya" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form class="modal-content" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="hidden" name="section" value="lainnya">

            <div class="modal-header">
                <h5 class="modal-title">Edit Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any() && $aktif === 'lainnya')
                    <div class="alert alert-danger">
                        <ul class="mb-0 pl-3">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-5 mb-3">
                        <p class="small text-muted mb-2">Logo Sekolah</p>
                        <div class="img-box">
                            <img id="preview-logoSekolah" src="{{ Storage::url($data->logoSekolah) }}" class="img-fluid" style="object-fit: contain" alt="">
                        </div>
                        <input type="file" name="logoSekolah" id="logoSekolah" class="d-none" accept="image/*">
                        <label for="logoSekolah" class="btn btn-warning btn-sm btn-block mt-2 mb-0">Ubah logo</label>
                    </div>
                    <div class="col-sm-7 mb-3">
                        <p class="small text-muted mb-2">Foto Sekolah</p>
                        <div class="img-box">
                            <img id="preview-fotoSekolah" src="{{ Storage::url($data->fotoSekolah) }}" class="img-fluid" style="object-fit: fill" alt="">
                        </div>
                        <input type="file" name="fotoSekolah" id="fotoSekolah" class="d-none" accept="image/*">
                        <label for="fotoSekolah" class="btn btn-warning btn-sm btn-block mt-2 mb-0">Ubah foto</label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <label>Deskripsi Sekolah</label>
                    <textarea name="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>


<script>
    // Tunggu jQuery + Bootstrap dari layout selesai dimuat
    window.addEventListener('load', () => {
        const $ = window.jQuery;

        document.querySelectorAll('.modal-edit').forEach(modal => {
            const form = modal.querySelector('form');

            // 1. Pindahkan modal ke <body> supaya tidak tertutup container template
            document.body.appendChild(modal);

            // 2. Simpan gambar asli, untuk dipulihkan saat modal ditutup
            modal.querySelectorAll('img[id^="preview-"]').forEach(img => img.dataset.original = img.src);

            // 3. Cegah klik ganda saat submit
            form.addEventListener('submit', () => {
                const btn = form.querySelector('[type="submit"]');
                btn.disabled = true;
                btn.textContent = 'Menyimpan...';
            });

            // 4. Modal ditutup = buang perubahan
            $(modal).on('hidden.bs.modal', () => {
                form.reset();
                modal.querySelectorAll('img[data-original]').forEach(img => img.src = img.dataset.original);
            });
        });

        // Preview gambar saat file dipilih (id gambar = "preview-" + nama input)
        document.addEventListener('change', e => {
            const file = e.target.type === 'file' && e.target.files[0];
            if (file) document.getElementById('preview-' + e.target.name).src = URL.createObjectURL(file);
        });

        @if ($errors->any())
            // Validasi gagal: buka lagi modal bagian yang tadi disimpan
            $('#modal-{{ $aktif }}').modal('show');
        @endif
    });
</script>
@endsection