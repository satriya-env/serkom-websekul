@extends('admin.temp')
@push('style')
        <style>
        #tableSiswa{
            border: 1px solid;
            border-color: #4d4d4d !important;
        }
        a{
            text-decoration: none
        }
    </style>
@endpush
@section('title', 'Data Siswa')
@section('content')


{{-- CONTENT --}}
    <div class="row mb-3">
        <div class="col-lg-6 mb-2">
            <a href="{{route('siswa.create')}}" class="btn btn-primary">Tambah data</a>
        </div>
        <div class="col-lg-6">
            <form action="{{ route('siswa.index') }}" method="GET" class="d-flex justify-content-lg-end">
                <div class="input-group-append" style="max-width: 500px;">
                    <select name="tahunMasuk" class="form-control">
                        <option value="">Semua Tahun</option>
                        @foreach ($filter as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahunMasuk') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-secondary mx-2">Filter</button>
                    @if(request('tahunMasuk'))
                        <a href="{{ route('siswa.index') }}" class="btn btn-outline-light">Reset</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive mx-auto rounded" id="tableSiswa">
        <table class="table mb-0 text-light text-nowrap" id="dataTable" style="min-width: 650px;">
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
                        <td class="text-center">
                            <div class="d-inline-flex align-items-center">
                            <a href="{{route('siswa.edit', $data->id)}}" class="btn btn-warning mr-2">
                                Edit
                            </a>
                            <a href="{{route('siswa.delete', $data->id)}}" onclick="return confirm('Hapus Data {{$data->namaSiswa}}?')" class="btn btn-danger">
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