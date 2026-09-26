<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        .bg-custom-image {
            background: url("{{ asset('assets/img/sample.jpg') }}") no-repeat center center fixed;
            background-size: cover;
        }
        
        .bg-custom-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }
       

        .container {
            position: relative;
            z-index: 1;
        }
    </style>

</head>

<!-- Perbaikan 1: Ganti bg-image menjadi bg-custom-image agar CSS background berjalan -->
<body class="bg-custom-image min-vh-100 d-flex align-items-center justify-content-center">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center w-100">

            <div class="col-xl-6 col-lg-7 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-auto" style="background-color:rgba(255, 255, 255, 0.685)">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4 text-dark">Welcome Back!</h1>
                                    </div>

                                    {{-- FORM LOGIN --}}
                                    <form class="user" method="POST" action="/login">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user" aria-describedby="emailHelp"
                                                name="username"
                                                type="text" 
                                                id="username"
                                                placeholder="Masukan Username"
                                                required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input class="form-control form-control-user"
                                                name="password"
                                                type="password" 
                                                id="password"
                                                placeholder="Masukan Password"
                                                required>
                                        </div>

                                        @error('username')
                                            <p class="text-danger small">{{$message}}</p>
                                        @enderror
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <!-- Perbaikan 3: Script Chart dihilangkan karena tidak digunakan di halaman login -->

</body>

</html>