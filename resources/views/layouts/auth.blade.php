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
    <link rel="shortcut icon" href="{{asset('img/smatmip_logo.png')}}" type=" image/x-icon">

    {{-- Data Tables --}}
    <link href=" https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body>
    <div class="container container-fluid justify-content-center">
        {{-- <div class="container col-lg-4 col-md-8 col-sm-8 login-form shadow">
            <div class="container text-light bg__login-header bg__first-color py-4">
                <div class="logo"><img src="{{asset('/img/smatmip_logo.png')}}" class="login__logo" alt="SMATMIP">
                </div>
                <div class="title">
                    <h4>Arsip Alumni<br />SMA TMIP</h4>
                </div>
            </div> --}}
            @yield('content')
        {{-- </div> --}}
    </div>

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
