@extends('temp')
@section('title', 'Data Siswa')
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
        <div class="col-lg-6 mb-4">
            <a href="{{route('siswa.create')}}" class="btn btn-primary">Tambah data</a>
        </div>
    </div>
    <div class="table-responsive mx-auto rounded overflow-hidden" id="tableSiswa">
        <table class="table mb-0 text-light" id="dataTable">
            <thead class="table-dark">
                <tr>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Gender</th>
                    <th>Tahun Masuk</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswa as $data)
                    <tr>
                        <td>{{$data->nisn}}</td>
                        <td>{{$data->namaSiswa}}</td>
                        <td>{{$data->jenisKelamin}}</td>
                        <td>{{$data->tahunMasuk}}</td>
                        <td>
                            <a href="{{route('siswa.edit', $data->id)}}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{route('siswa.delete', $data->id)}}" onclick="return confirm('Hapus Data {{$data->namaSiswa}}?')" class="btn btn-danger mx-3">
                                Hapus
                            </a>
                        </td>
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