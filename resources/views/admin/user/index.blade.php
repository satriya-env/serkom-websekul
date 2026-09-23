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
            <a href="{{route('user.create')}}" class="btn btn-primary">Tambah data</a>
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
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $data)
                    <tr>
                        <td>{{ $data->username }} </td>
                        <td>{{ $data->role }} </td>
                        <td>{{ $data->status }} </td>
                        <td>
                            <a href="{{route('user.edit', $data->id)}}" class="btn btn-warning">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a href="{{route('user.delete', $data->id)}}" onclick="return confirm('Hapus Data{{$data->username}} ?')" class="btn btn-danger">
                                Hapus
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">DATA NOT FOUND</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection