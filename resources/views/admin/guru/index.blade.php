@extends('temp')
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
    <div class="row">
        <div class="col-lg-6 mb-4">
            <a href="{{route('guru.create')}}" class="btn btn-primary">Tambah data</a>
        </div>
    </div>
    <div class="table-responsive mx-auto rounded overflow-hidden" id="tableSiswa">
        <table class="table mb-0 text-light" id="dataTable">
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
                        <td>
                            <a href="{{route('guru.edit', $data->id)}}" class="btn btn-warning">
                                Edit
                            </a>
                            <a href="{{route('guru.delete', $data->id)}}"
                                onclick="return confirm('Hapus Data {{$data->namaGuru}}?')" class="btn btn-danger mx-3">
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