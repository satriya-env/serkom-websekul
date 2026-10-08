@extends('admin.temp')
@section('title', 'Edit Data')
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
            <form class="user w-50 mx-auto my-5" action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <h5>Nama lengkap</h5>
                    <input type="text" class="form-control" 
                        id="name" 
                        name="name" 
                        placeholder="Nama Lengkap"
                        value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <h5>Username</h5>
                    <input type="text" class="form-control" 
                        id="username" 
                        name="username" 
                        placeholder="Enter username"
                        value="{{ old('username', $user->username) }}" required>
                </div>

                <div class="form-group">
                    <h5>Password</h5>
                    <input type="password" class="form-control" 
                        id="password" 
                        name="password" 
                        placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>

                <div class="form-group">
                    <h5>Role</h5>
                    <select name="role" id="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Operator" {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                </div>

                <div class="form-group">
                    <h5>Status</h5>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Aktif" {{ old('status', $user->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status', $user->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
            </form>
        </div>
    </div>   
@endsection