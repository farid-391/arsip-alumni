<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Required meta tags --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap Styles --}}
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" type="text/css">

    {{-- CSS Custom Styles --}}
    <link rel="stylesheet" href="{{asset('/css/public.style.css')}}" type="text/css">

    {{-- Box Icons --}}
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    {{-- FavIcon --}}
    <link rel="shortcut icon" href="{{asset('img/logo_tamsis.png')}}" type="image/x-icon">

    {{-- Data Tables --}}
    <link href=" https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body class="m-0 p-0">
    <nav class="navbar fixed-top navbar-expand-lg bg__first-color mb-4">
        <div class="container-fluid">
            <a href="#" class="nav__logo d-flex flex-row align align-items-center">
                <img src="{{asset('img/logo_tamsis.png')}}" class="nav__logo-icon mr-3" alt="SMTMIP">
                <span class="nav__logo-name text-white">Arsip Alumni SMA TMIP<br />Yogyakarta
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @yield('nav-status-1')" aria-current="page" href="{{url('/')}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav-status-2')" aria-current="page" href="{{url('/lihat/tahun-akademik')}}">Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav-status-3')" href="{{url('/lihat/alumni')}}">Alumni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav-status-4') pb-2 mb-2 mr-4" href="{{url('/lihat/prestasi')}}">Prestasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn__icon-white text-white" href="{{url('/masuk')}}">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="pt-2 m-0 px-0 mb-4 .bd_column">
            <div class="container container-fluid col-lg-10 col-sm-10 px-1 mt-4 pt-lg-5">
                @yield('content')
            </div>
        </div>
    </main>
    <footer>
        <div class="container-fluid bg__first-color mt-5 pt-5">
            <div class="row">
                <div class="col text-center text-white py-3">
                    <span class="align-middle fw-light">Copyright &copy SMA Taman Madya Ibu Pawiyatan Yogyakarta <br>Farid Afgar > Refinaldy Madras | UAD 2021</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Scripts -->
    <script src="{{ asset('/js/jquery.js') }}"></script>

    {{-- {{-- // Popper --}}
    <script src="{{ asset('/js/popper.js') }}"></script>

    {{-- Bootstrap JS --}}
    <script src="/js/app.js"></script>

    {{-- {{-- // Custom JS --}}

    <script src="{{ asset('/js/second.js') }}"></script>

    {{-- Datables --}}

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>
</html>
