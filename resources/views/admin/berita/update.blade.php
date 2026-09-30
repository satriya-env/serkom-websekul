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

                <form class="user w-75 mx-auto my-4" action="{{ route('berita.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="text-center text-white mb-4">Edit Berita</h3>

                    {{-- Judul --}}
                    <div class="form-group">
                        <label for="judul" class="text-light">Judul</label>
                        <input type="text" class="form-control" 
                            id="judul" 
                            name="judul" 
                            placeholder="Masukkan Judul Berita"
                            value="{{ old('judul', $data->judul) }}" required>
                    </div>

                    {{-- Isi Berita (Diubah ke Textarea agar muat teks panjang) --}}
                    <div class="form-group">
                        <label for="isi" class="text-light">Isi Berita</label>
                        <textarea class="form-control" 
                            id="isi" 
                            name="isi" 
                            rows="5"
                            placeholder="Masukkan Isi Berita" required>{{ old('isi', $data->isi) }}</textarea>
                    </div>

                    {{-- Status --}}
                    <div class="form-group">
                        <label for="status" class="text-light">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">-- Status --</option>
                            <option value="Draf" {{ old('status', $data->status) == 'Draf' ? 'selected' : '' }}>Draf</option>
                            <option value="Publish" {{ old('status', $data->status) == 'Publish' ? 'selected' : '' }}>Publish</option>
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

                    {{-- Input Gambar --}}
                    <div class="form-group">
                        <label for="gambar" class="text-light">Gambar Berita</label>
                        
                        {{-- Preview Gambar Lama --}}
                        @if(!empty($data->gambar))
                            <div class="mb-2">
                                <img src="{{ Storage::url($data->gambar) }}" alt="Gambar Berita" height="100" class="img-thumbnail bg-dark border-secondary">
                            </div>
                        @endif
                        
                        <input type="file" class="form-control-file text-light" id="gambar" name="gambar" accept="image/*">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>

                    <hr class="border-secondary">

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Simpan Data
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection