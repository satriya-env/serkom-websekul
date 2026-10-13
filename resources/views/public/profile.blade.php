@extends('public.temp')
@section('title', 'Profil Pembuat')

@section('content')
{{-- HEADER --}}
    <div class="py-5 text-white"
         style="background-image: linear-gradient(to bottom, rgba(0,0,0,.6), rgba(0,0,0,.25)), url('{{ asset('assets/img/banner.png') }}'); background-size: cover; background-position: center;">
        <div class="container pt-5 mt-lg-5">
            <span class="small font-weight-bold text-warning d-block pt-5">Orang dibalik Layar</span>
            <h1 class="font-weight-bold m-0">Tentang Pengembang</h1>
            <nav aria-label="breadcrumb" class="p-0 m-0">
                <ol class="breadcrumb bg-transparent p-0 mb-0 py-3">
                    <li class="breadcrumb-item"><a href="{{ route('public.home') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item active text-white-50" aria-current="page">Tentang Pengembang</li>
                </ol>
            </nav>
        </div>
    </div>
    {{-- CARD PROFIL --}}
    <div class="container py-5 my-lg-4">
        <div class="mx-auto" style="max-width:1000px;">
            <div class="card overflow-hidden shadow" id="cardSambutan">
                <div class="row no-gutters align-items-stretch">
                    <div class="col-md-4 col-12">
                        <img src="{{ asset('assets/img/admin.jpg') }}" alt="Foto Admin" class="w-100 h-100" style="object-fit:cover; max-height:300px;">
                    </div>
                    <div class="col-md-8 col-12 d-flex">
                        <div class="card-body p-4 text-center text-md-left">
                            <h2 class="card-title text-primary font-weight-bold h4">Sepatah Kata dari Pegembang</h2>
                            <div class="card-text">
                                <p>Sebagai pengembang yang merancang dan membangun website ini, merupakan suatu kebanggaan bagi saya dapat menyelesaikannya dengan tuntas. 
                                    Saya ucapkan terima kasih telah berkunjung ke website ini.</p>
                                <p class="mb-5">Jika ada masukan terkait website ini maupun lainnya, 
                                    anda dapat menghubungi kontak saya yang tertera pada Profil berikut.</p>
                                <span class="font-weight-bold">Satriya Handika</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- PROFIL --}}
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-primary">
                <h6 class="m-0 font-weight-bold text-light">Biodata Lengkap</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody class="text-dark">
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: Satriya Handika</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: Laki-laki</td>
                            </tr>
                            <tr>
                                <th>Tempat, Tgl Lahir</th>
                                <td>: Bandung, 07 Desember 2007</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: satriyahnd27@gmail.com</td>
                            </tr>
                            <tr>
                                <th>No. Whatsapp</th>
                                <td><a href="https://wa.me/83869225585" style="text-decoration: none;" class="text-dark">: 083869225585</a></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: Jl. Moch Toha Gg.Empang No.37/A 40255, Bandung, Jawa Barat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection