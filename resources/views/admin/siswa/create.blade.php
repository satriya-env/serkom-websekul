@extends('admin.temp')
@section('title','Tambah Data')
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
            <form class="user w-50 mx-auto my-5" action="{{ route('siswa.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="nisn" 
                        name="nisn" 
                        maxlength="10"
                        inputmode="numeric"
                        placeholder="NISN"
                        value="{{ old('nisn') }}" required>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" 
                        id="namaSiswa" 
                        name="namaSiswa" 
                        placeholder="Nama Lengkap"
                        value="{{ old('namaSiswa') }}" required>
                </div>

                <div class="form-group">
                    <select name="jenisKelamin" id="jenisKelamin" class="form-control" required>
                        <option value="">Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('role') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('role') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" 
                        id="tahunMasuk" 
                        name="tahunMasuk" 
                        min="1998"
                        max="{{date('Y')}}"
                        placeholder="Tahun Masuk"
                        value="{{ old('tahunMasuk') }}" required>
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        

    </div>
@endsection