@extends('temp')
@section('title', 'Data Siswa')
@section('content')
{{-- STYLES --}}
<style>
    #tableSiswa{
        border: 1px solid;
        border-color: #4d4d4d !important;
    }
</style>

{{-- CONTENT --}}
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="btn btn-primary">Tambah Data</div>
            <div class="btn btn-warning">Edit</div>
        </div>
    </div>
    <div class="table-responsive mx-auto rounded overflow-hidden" id="tableSiswa">
        <table class="table mb-0 text-light" id="dataTable">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $data)
                    <tr>
                        <td>{{$data->username}}</td>
                        <td>{{$data->role}}</td>
                        <td>{{$data->status}}</td>
                    </tr>    
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Database masih kosong...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection