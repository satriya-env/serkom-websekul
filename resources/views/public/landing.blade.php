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
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.15) !important;
        backdrop-filter: blur(10px);
        
        z-index: 1040 !important;
    }

    #content {
        padding-top: 100px !important;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand navbar-light topbar navbar-floating bg-gradient-primary text-center">
        <div class="row">
            <div class="row mx-5 align-items-center">
                <img src="{{asset('storage/profil/logo/sample.png')}}" alt="" style="height: 45px">
                <span class="ml-3 text-light">SMK YPC TASIKMALAYA</span>
            </div>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
        </ul>
    </nav>

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