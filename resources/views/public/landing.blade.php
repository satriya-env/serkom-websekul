<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SMK YPC</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    @stack('style')
    <style>
        .topbar.navbar-floating {
            position: fixed !important;
            top: 20px !important;
            
            left: 50% !important;
            transform: translateX(-50%) !important;
            
            width: 90% !important;
            max-width: 1100px !important;
            height: 4.375rem;
            
            border-radius: 25px !important;
            box-shadow: 0 1rem 1.5rem rgba(0, 0, 0, 0.5) !important;
            backdrop-filter: blur(10px);
            
            z-index: 1040 !important;
        }

        .dropdown-item{
            color: aliceblue
        }
        .dropdown-item:hover{
            color: rgb(0, 82, 153)
        }

        #content {
            padding-top: 100px !important;
        }
        .carousel-item {
        position: relative;
        }

        /* Memasang lapisan hitam transparan di atas gambar */
        .carousel-item::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.8));
            pointer-events: none;
        }

        .carousel-item img {
            width: 100%;
            height: 700px !important;
            object-fit: cover;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand navbar-light topbar navbar-floating bg-gradient-primary text-center position-absolute" style="top: 20px; width: 90%; border-radius: 30px; z-index: 10;">
        <div class="row mx-3 align-items-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="Logo" style="height: 45px">
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <span>Beranda</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <span>Profil</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="programDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Program</span>
                </a>
                <div class="dropdown-menu bg-gradient-primary shadow" aria-labelledby="programDropdown">
                    <a class="dropdown-item" href="#">Jurusan</a>
                    <a class="dropdown-item" href="#">Ekstrakulikuler</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    <span>Galeri</span>
                </a>
            </li>
        </ul>
    </nav>

    {{-- Slide image --}}
    <div id="slide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            {{-- ITEM 1 --}}
            <div class="carousel-item active">
                <img src="{{asset('assets/img/banner/1.png')}}" class="d-block">
                <div class="carousel-caption d-flex align-items-center h-100 w-25 text-left">
                    <div>
                        <span class="text-warning font-weight-bold">SEKOLAH UNGGULAN</span>
                        <h1 class="font-weight-bold">Membangun Generasi Emas</h1>
                        <span>Lingkungan belajar modern dengan tenaga pendidik profesional dan program terarah untuk membentuk karakter, kompetensi, dan kesiapan karier siswa.</span>
                    </div>
                </div>
            </div>

            {{-- ITEM 2 --}}
            <div class="carousel-item">
                <img src="{{asset('assets/img/banner/2.jpg')}}" class="d-block">
                <div class="carousel-caption d-flex align-items-center h-100 w-25 text-left">
                    <div>
                        <span class="text-warning font-weight-bold">BELAJAR & BERKARYA</span>
                        <h1 class="font-weight-bold">Tempat Tumbuh Bakat dan Prestasi</h1>
                        <span>Kami menghadirkan pendidikan berkualitas yang mengembangkan akademik, keterampilan, dan nilai karakter untuk masa depan yang lebih cerah.</span>
                    </div>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
    </div>

    {{-- Content --}}
    <div class="container my-5">
        {{-- CARD SAMBUTAN --}}
        <div class="row justify-content-center my-4">
            <div class="col-12" style="max-width: 1000px;">
                <div class="card overflow-hidden shadow-sm">
                    <div class="row no-gutters align-items-center">
                        
                        <div class="col-md-4 col-12 text-center bg-light">
                            <img src="{{ asset('assets/img/kepala.jpg') }}" alt="Foto Kepala" class="img-fluid w-100" style="object-fit: cover;">
                        </div>
                        
                        <div class="col-md-8 col-12">
                            <div class="card-body p-4">
                                <span class="text-warning font-weight-bold d-block mb-1">KOMITMEN KAMI UNTUK PENDIDIKAN</span>
                                <h2 class="card-title text-primary font-weight-bold h4">Sambutan dari Kepala Sekolah</h2>
                                <div class="card-text">
                                    <p>Puji syukur ke hadirat Tuhan YME atas segala rahmat dan karunia-Nya. Selamat datang di website resmi sekolah kami.</p>
                                    <p class="mb-0">Website ini kami hadirkan sebagai sarana informasi dan komunikasi antara sekolah dengan orang tua, peserta didik, serta masyarakat luas. 
                                    Dengan harapan seluruh informasi mengenai kegiatan, prestasi, serta program pendidikan dapat tersampaikan secara transparan, cepat, dan akurat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- PROFIL SEKOLAH --}}
        <div class="container profil-section w-100" style="background-image: url('{{ asset('assets/img/banner.png') }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-12">
                        <span class="text-warning font-weight-bold d-block mb-2">PROFIL SEKOLAH</span>
                        <h2 class="font-weight-bold mb-4">Selamat Datang di SMK YPC Tasikmalaya!</h2>

                        <p>
                            Sekolah kami merupakan institusi pendidikan yang berkomitmen untuk menciptakan generasi unggul, berkarakter, dan siap menghadapi tantangan masa depan. Dengan mengedepankan kualitas pendidikan yang seimbang antara akademik dan keterampilan praktis, kami hadir sebagai solusi pendidikan modern yang relevan dengan perkembangan zaman.
                        </p>
                        <p>
                            Didirikan dengan visi untuk menjadi sekolah yang inovatif dan berdaya saing, kami terus berupaya menghadirkan lingkungan belajar yang inspiratif, nyaman, dan mendukung perkembangan potensi setiap siswa. Kami percaya bahwa setiap siswa memiliki keunikan dan potensi yang dapat dikembangkan melalui pendekatan pendidikan yang tepat.
                        </p>

                        <a href="#" class="btn btn-profil mt-3">
                            Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- CARD BERITA --}}
        <div class="text-center my-5">
            <h3 class="font-weight-bold text-primary">Berita dan Artikel</h3>
            <span>Berita terbaru terkait sekolah kami</span>
        </div>
        <div class="row justify-content-center">
            <div class="col-12" style="">
                <div class="row">
                    @forelse ($berita as $data)
                    {{-- Card 1 --}}
                    <div class="col-md col-12 mb-4">
                        <div class="card h-100 shadow-sm text-center">

                            <img src="{{ asset('storage/' . $data->gambar) }}" class="card-img-top" alt="{{$data->judul}}" style="height: 200px; object-fit: cover;">

                            <div class="card-body p-4">
                                <h5 class="card-title font-weight-bold">{{$data->judul}}</h5>
                                <p class="card-text text-muted">{{$data->isi}}</p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        Belum ada berita.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    

<!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>
</body>
</html>