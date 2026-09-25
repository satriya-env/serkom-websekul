<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard WebSchools - Form Sekolah</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top" class="bg-dark">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <nav class="navbar navbar-expand navbar-dark bg-dark topbar static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <span class="badge badge-danger badge-counter">99+</span>
                            </a>
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Alerts Center</h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-300 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="{{asset('assets/img/undraw_profile_2.svg')}}" height="50">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid bg-dark min-vh-100 py-5">

                    <div class="card bg-dark text-white mx-auto w-75 border-secondary shadow">
                        <div class="card-body">
                            
                            {{-- Alert Notifikasi Sukses --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {{-- Alert Error Validasi --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="user w-75 mx-auto my-4" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                
                                <h3 class="text-center text-white mb-4">Form Data Sekolah</h3>

                                {{--  Input file gambar --}}
                                <div class="form-group">
                                    <label for="foto" class="text-light">Foto Sekolah</label>
                                    @if(isset($data->foto))
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $data->foto) }}" alt="Logo Sekolah" height="80" class="img-thumbnail bg-dark border-secondary">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control-file text-light" id="foto" name="foto" accept="image/*">
                                </div>

                                <div class="form-group">
                                    <label for="logo" class="text-light">Logo Sekolah</label>
                                    @if(isset($data->logo))
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $data->logo) }}" alt="Logo Sekolah" height="80" class="img-thumbnail bg-dark border-secondary">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control-file text-light" id="logo" name="logo" accept="image/*">
                                </div>

                                {{-- Nama Sekolah  --}}
                                <div class="form-group">
                                    <label for="namaSekolah" class="text-light">Nama Sekolah</label>
                                    <input type="text" class="form-control" 
                                        id="namaSekolah" 
                                        name="namaSekolah" 
                                        placeholder="Masukkan Nama Sekolah"
                                        value="{{ old('namaSekolah', $data->namaSekolah ?? '') }}" required>
                                </div>

                                {{--  Kepala Sekolah  --}}
                                <div class="form-group">
                                    <label for="kepalaSekolah" class="text-light">Kepala Sekolah</label>
                                    <input type="text" class="form-control" 
                                        id="kepalaSekolah" 
                                        name="kepalaSekolah" 
                                        placeholder="Nama Kepala Sekolah"
                                        value="{{ old('kepalaSekolah', $data->kepalaSekolah ?? '') }}" required>
                                </div>

                                {{--  NPSN  --}}
                                <div class="form-group">
                                    <label for="npsn" class="text-light">NPSN</label>
                                    <input type="text" class="form-control" 
                                        id="npsn" 
                                        name="npsn" 
                                        placeholder="Nomor Pokok Sekolah Nasional"
                                        value="{{ old('npsn', $data->npsn ?? '') }}" required>
                                </div>

                                {{--  Kontak  --}}
                                <div class="form-group">
                                    <label for="kontak" class="text-light">Kontak / No. Telepon</label>
                                    <input type="text" class="form-control" 
                                        id="kontak" 
                                        name="kontak" 
                                        placeholder="Nomor Telepon/HP"
                                        value="{{ old('kontak', $data->kontak ?? '') }}" required>
                                </div>

                                {{--  Tahun Berdiri  --}}
                                <div class="form-group">
                                    <label for="tahunBerdiri" class="text-light">Tahun Berdiri</label>
                                    <input type="number" class="form-control" 
                                        id="tahunBerdiri" 
                                        name="tahunBerdiri" 
                                        placeholder="Tahun Berdiri (Contoh: 1997)"
                                        value="{{ old('tahunBerdiri', $data->tahunBerdiri ?? '') }}" required>
                                </div>

                                {{--  Alamat  --}}
                                <div class="form-group">
                                    <label for="alamat" class="text-light">Alamat</label>
                                    <textarea class="form-control" 
                                        id="alamat" 
                                        name="alamat" 
                                        rows="3" 
                                        placeholder="Alamat Lengkap Sekolah" required>{{ old('alamat', $data->alamat ?? '') }}</textarea>
                                </div>

                                {{--  Visi & Misi  --}}
                                <div class="form-group">
                                    <label for="visiMisi" class="text-light">Visi & Misi</label>
                                    <textarea class="form-control" 
                                        id="visiMisi" 
                                        name="visiMisi" 
                                        rows="3" 
                                        placeholder="Misi / Visi Sekolah" required>{{ old('visiMisi', $data->visiMisi ?? '') }}</textarea>
                                </div>

                                {{--  Deskripsi  --}}
                                <div class="form-group">
                                    <label for="deskripsi" class="text-light">Deskripsi</label>
                                    <textarea class="form-control" 
                                        id="deskripsi" 
                                        name="deskripsi" 
                                        rows="4" 
                                        placeholder="Deskripsi Singkat Sekolah" required>{{ old('deskripsi', $data->deskripsi ?? '') }}</textarea>
                                </div>

                                <hr class="border-secondary">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan Data Sekolah</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-dark">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto text-gray-500">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>