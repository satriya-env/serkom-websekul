@extends('admin.temp')
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
        <div class="row align-items-center mb-4">
            <div class="col-md-6 col-lg-4 my-2">
                <a href="{{ route('mapel.create') }}" class="btn btn-primary">Tambah data</a>
            </div>

            <div class="col-md-6 col-lg-8 my-2">
                <form action="{{ route('mapel.index') }}" method="GET" class="form-inline justify-content-md-end">
                    <div class="input-group w-100" style="max-width: 400px;">
                        <input type="text" name="search" class="form-control" placeholder="Cari..."
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="table-responsive mx-auto rounded" id="tableSiswa">
        <table class="table mb-0 text-light text-nowrap" id="dataTable" style="min-width: 650px;">
            <thead class="table-dark">
                <tr>
                    <th>Nama Pelajaran</th>
                    <th>Singkatan/Kode</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $item->pelajaran }}</td>
                        <td>{{ $item->alias }}</td>
                        <td class="text-center">
                            <div class="d-inline-flex align-items-center">
                                <a href="{{ route('mapel.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">
                                    Edit
                                </a>
                                <a href="{{ route('mapel.delete', $item->id) }}" onclick="return confirm('Hapus Data {{ $item->pelajaran }}?')" class="btn btn-danger btn-sm">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">DATA NOT FOUND</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection