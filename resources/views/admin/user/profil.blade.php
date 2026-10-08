@extends('admin.temp')
@section('title', 'Edit Profil')
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
                        value="{{ Auth::user()->username }}" required>
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
        

    </div>
@endsection