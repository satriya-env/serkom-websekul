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
            <form class="user w-50 mx-auto my-5" action="{{ route('mapel.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <h5>Nama Pelajaran</h5>
                    <input type="text" class="form-control" 
                        id="pelajaran" 
                        name="pelajaran" 
                        placeholder="Nama Pelajaran"
                        value="{{ old('pelajaran', $data->pelajaran) }}" required>
                </div>

                <div class="form-group">
                    <h5>Kode Pelajaran</h5>
                    <input type="text" class="form-control" 
                        id="alias" 
                        name="alias" 
                        placeholder="Kode Pelajaran"
                        value="{{ old('alias', $data->alias) }}" required>
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection