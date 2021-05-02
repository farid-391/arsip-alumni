<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Required meta tags --}}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap Styles --}}
    <link href="/css/app.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('/css/app.css')}}" type="text/css"> --}}

    {{-- CSS Custom Styles --}}
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" type="text/css">

    {{-- Box Icons --}}
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    {{-- FavIcon --}}
    <link rel="shortcut icon" href="{{asset('img/smatmip_logo.png')}}" type="image/x-icon">

    {{-- Data Tables --}}
    <link href=" https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body id="body-pd">
    {{--Include Header --}}
    <header class="header" id="header">
        @include('includes.header')
    </header>

    {{-- Include Navbar --}}
    <nav>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo d-flex flex-row align align-items-center">
                        <img src="{{asset('img/smatmip_logo.png')}}" class="nav__logo-icon" alt="SMTMIP">
                        <span class="nav__logo-name">Arsip Alumni<br />SMA TMIP
                        </span>
                    </a>
                    <hr class="nav__line" />
                    <div class="nav__list mb-5">
                        <a href="{{ url('/beranda')}}" class="nav__link @yield('nav-status-1')">
                            <i class='bx bx-grid-alt nav__icon'></i>
                            <span class="nav__name">Beranda</span>
                        </a>
                        <a href="{{ url('/tahun-akademik')}}" class="nav__link @yield('nav-status-2')">
                            <i class=' bx bx-calendar-alt nav__icon'></i>
                            <span class="nav__name">Tahun Akademik</span>
                        </a>
                        <a href="{{ url('/alumni')}}" class="nav__link @yield('nav-status-3')">
                            <i class=' bx bx-user nav__icon'></i>
                            <span class="nav__name">Alumni</span>
                        </a>
                        <a href="{{ url('/prestasi')}}" class="nav__link @yield('nav-status-4')">
                            <i class='bx bx-trophy nav__icon'></i>
                            <span class="nav__name">Prestasi</span>
                        </a>
                    </div>
                    <div class="nav__list link-bottom">
                        {{-- <a href="{{ url('/akun')}}" class="nav__link @yield('nav-status-5')">
                            <i class=" bx bxs-cog nav__icon"></i>
                            <span class="nav__name">Pengaturan Akun</span>
                        </a> --}}
                        <a href="{{url('/')}}" class="nav__link">
                            <i class=' bx bx-log-out nav__icon'></i>
                            <span class="nav__name">Keluar</span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="container col-lg-12">
        <main>
            <div class="container container-fluid col-lg-12 p-lg-1 px-0">
                @yield('content')
            </div>
        </main>
    </div>
    <footer>
        <div class="container-fluid bg-light mt-5 pt-5">
            <div class="row">
                <div class="col text-center text-muted py-3">
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

    <script src="{{ asset('/js/main.js') }}"></script>

   
    {{-- Datables --}}

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
</body>
</html>
