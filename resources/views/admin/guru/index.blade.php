@extends('admin.temp')
@section('title', 'Data Guru')
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
    <div class="row align-items-center mb-4">
        <div class="col-md-6 col-lg-4 my-2">
            <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah data</a>
        </div>

        <div class="col-md-6 col-lg-8 my-2">
            <form action="{{ route('guru.index') }}" method="GET" class="form-inline justify-content-md-end">
                <div class="input-group w-100" style="max-width: 400px;">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama Guru..." value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="table-responsive mx-auto rounded" id="tableSiswa">
        <table class="table mb-0 text-light text-nowrap" id="dataTable" style="min-width: 650px;">
            <thead class="table-dark">
                <tr>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Mapel</th>
                    <th>Foto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($guru as $data)
                    <tr>
                        {{-- <td>{{$iteration}}</td> --}}
                        <td>{{$data->nip}}</td>
                        <td>{{$data->namaGuru}}</td>
                        <td>{{$data->mapel}}</td>
                        <td>
                            <img src="{{Storage::url($data->foto)}}" 
                                alt="foto"
                                width="100">
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex align-items-center">
                            <a href="{{route('guru.edit', $data->id)}}" class="btn btn-warning mr-2">
                                Edit
                            </a>
                            <a href="{{route('guru.delete', $data->id)}}"
                                onclick="return confirm('Hapus Data {{$data->namaGuru}}?')" class="btn btn-danger">
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