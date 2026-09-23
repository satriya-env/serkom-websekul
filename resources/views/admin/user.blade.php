@extends('temp')
@section('title', 'Data User')
@section('content')
{{-- STYLES --}}
<style>
    #tableSiswa{
        border: 1px solid;
        border-color: #4d4d4d !important;
    }
    a{
        text-decoration: none
    }
</style>

{{-- CONTENT --}}
    <div class="row">
        <div class="col-lg-6 my-4">
            <a href="#" class="btn btn-primary">Tambah data</a>
        </div>
    </div>
    <div class="table-responsive mx-auto rounded overflow-hidden" id="tableSiswa">
        <table class="table mb-0 text-light" id="dataTable">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($siswa as $data)
                    <tr>
                        <td>{{$data->nisn}}</td>
                        <td>{{$data->namaSiswa}}</td>
                        <td>{{$data->jenisKelamin}}</td>
                        <td>{{$data->tahunMasuk}}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>    
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Database masih kosong...</td>
                    </tr>
                @endforelse --}}
                <tr>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection