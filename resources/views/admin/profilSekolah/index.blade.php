@extends('temp')
@section('title', 'Profil Sekolah')
@section('content')
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title">title</h3>
            <div class="mt-4">
                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Logo</div>
                    <div class="col-md-9 col-8">: <img src="{{ Storage::url($data->logo)}}" alt="logo" width="150"></div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Nama Sekolah</div>
                    <div class="col-md-9 col-8">: {{ $data->namaSekolah }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Kepala Sekolah</div>
                    <div class="col-md-9 col-8">: {{ $data->kepalaSekolah }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">NPSN</div>
                    <div class="col-md-9 col-8">: {{ $data->npsn }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Kontak</div>
                    <div class="col-md-9 col-8">: {{ $data->kontak }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Tahun Berdiri</div>
                    <div class="col-md-9 col-8">: {{ $data->tahunBerdiri }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Alamat</div>
                    <div class="col-md-9 col-8">: {{ $data->alamat }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Misi & Misi</div>
                    <div class="col-md-9 col-8" style="white-space: pre-line;">: {{ $data->visiMisi }}</div>
                </div>

                <div class="row py-2 border-bottom align-items-center">
                    <div class="col-md-3 col-4 fw-bold text-dark">Deskripsi</div>
                    <div class="col-md-9 col-8">: {{ $data->deskripsi }}</div>
                </div>
            </div>
        </div>
        <a href="{{route('profil.form', $data->id)}}" class="btn btn-primary my-3 mx-5">Edit</a>
    </div>
@endsection