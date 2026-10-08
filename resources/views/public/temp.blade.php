<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'SMK YPC')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        html, body {
            margin: 0;
            padding: 0;
            max-width: 100%;
            overflow-x: hidden;
        }
        img { max-width: 100%; }

        /* ===== NAVBAR ===== */
        .topbar.navbar-floating {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 24px);
            max-width: 1100px;
            height: auto;
            min-height: 4.375rem;
            border-radius: 25px;
            box-shadow: 0 0.5rem 0.5rem rgba(0, 0, 0, 0.5);
            z-index: 1040;
        }
        .topbar.navbar-floating .navbar-brand img { height: 45px; max-width: none; }
        .topbar .navbar-toggler { border: none }

        .topbar .nav-link { transition: opacity .2s; }
        .topbar .nav-link:hover { opacity: .75; }
        .dropdown-menu {
            background-color: #1a2b88;
        }
        .dropdown-item { color: aliceblue; }
        .dropdown-item:hover,
        .dropdown-item:focus {
            color: #fff;
            background: rgba(255, 255, 255, .15);
        }

        /* Menu dropdown di HP: tampil di dalam navbar, bukan melayang keluar layar */
        @media (max-width: 767.98px) {
            .topbar.navbar-floating { border-radius: 20px; }
            .topbar .navbar-collapse { padding: .5rem 0 1rem; }
            .topbar .dropdown-menu {
                position: static;
                float: none;
                border: 0;
                box-shadow: none !important;
                background-color: #fff;
            }
            .dropdown-item{
                color: #1a2b88;
            }
        }

        /* ===== FOOTER ===== */
        .site-footer {
            color: rgba(255, 255, 255, .85);
            padding: 3rem 0 0;
            margin-top: 3rem;
        }
        .site-footer h5 {
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: .05em;
        }
        .site-footer a {
            color: rgba(255, 255, 255, .85);
            text-decoration: none;
            transition: opacity .2s, padding-left .2s;
        }
        .site-footer a:hover {
            color: #fff;
            opacity: .75;
        }
        .site-footer .footer-links li { margin-bottom: .5rem; }
        .site-footer .footer-links a:hover { padding-left: 4px; }
        .site-footer .footer-logo { height: 50px; max-width: none; margin-bottom: 1rem; }
        .site-footer .contact-item { display: flex; margin-bottom: .75rem; }
        .site-footer .contact-item i { width: 24px; margin-top: 4px; flex-shrink: 0; }
        .site-footer .social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            margin-right: .4rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, .15);
        }
        .site-footer .social a:hover {
            background: rgba(255, 255, 255, .3);
            opacity: 1;
        }
        .site-footer .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .2);
            margin-top: 2rem;
            padding: 1rem 0;
            font-size: .875rem;
            text-align: center;
        }
    </style>

    @stack('style')
</head>
<body id="page-top">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark topbar navbar-floating bg-gradient-primary px-3">
        <a class="navbar-brand m-0" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SMK YPC">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu"
                aria-controls="navMenu" aria-expanded="false" aria-label="Buka menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('public.home') }}" class="nav-link text-white">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('public.profil')}}" class="nav-link text-white">Profil</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('public.berita')}}" class="nav-link text-white">Berita</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="programDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Program
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="programDropdown">
                        <a class="dropdown-item" href="{{ route('public.jurusan') }}">Jurusan</a>
                        <a class="dropdown-item" href="{{ route('public.eskul') }}">Ekstrakurikuler</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('public.galeri') }}" class="nav-link text-white">Galeri</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- Content --}}
    @yield('content')
    
    <a class="scroll-to-top rounded bg-primary" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- FOOTER --}}
    <footer class="site-footer bg-gradient-primary">
        <div class="container">
            <div class="row justify-content-between">
                {{-- Tentang (kiri) --}}
                <div class="col-lg-5 col-md-6 mb-4">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SMK YPC" class="footer-logo">
                    <p class="mb-3">
                        SMK YPC berkomitmen mencetak lulusan yang kompeten, berkarakter,
                        dan siap bersaing di dunia kerja maupun wirausaha.
                    </p>
                    <div class="social">
                        @forelse ($sosmed as $item)
                            <a href="{{ $item->link }}" aria-label="{{$item->platform}}" target="_blank"><i class="fab fa-{{$item->platform}}" ></i></a>
                        @empty
                            <span>Belum ada sosmed</span>
                        @endforelse
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 mb-4 ml-md-auto">
                    <h5>Hubungi Kami</h5>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>
                            Jl. Garut - Tasikmalaya, Cikunten Singaparna Tasikmalaya, Jawa Barat 46414
                        </span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span><a href="tel:+0265546717">0265-546717</a></span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span><a href="mailto:smkypctasikmalaya@gmail.com">smkypctasikmalaya@gmail.com</a></span>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; {{ date('Y') }} SMK YPC. Hak cipta dilindungi.
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    @stack('script')
</body>
</html>