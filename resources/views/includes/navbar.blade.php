<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="#" class="nav__logo d-flex flex-row align align-items-center">
                <img src="{{asset('img/smatmip_logo.png')}}" class="nav__logo-icon" alt="SMTMIP">
                <span class="nav__logo-name">Arsip Alumni<br />SMA TMIP
                </span>
            </a>
            <hr class="nav__line" />
            <div class="nav__list">
                <a href="{{ url('/')}}" class="nav__link active">
                    <i class='bx bx-grid-alt nav__icon'></i>
                    <span class="nav__name">Dashboard</span>
                </a>
                <a href="{{ url('/alumni/tahun-akademik')}}" class="nav__link">
                    <i class=' bx bx-user nav__icon'></i>
                    <span class="nav__name">Alumni</span>
                </a>
                <a href="{{ url('/alumni/tahun-akademik')}}" class="nav__link">
                    <i class='bx bx-trophy nav__icon'></i>
                    <span class="nav__name">Prestasi</span>
                </a>
                <a href="#" class="nav__link">
                    <i class=' bx bx-envelope nav__icon'></i>
                    <span class="nav__name">Kotak Masuk</span>
                </a>
            </div>
        </div>
        <a href="Pages/login.html" class="nav__link">
            <i class=' bx bx-log-out nav__icon'></i>
            <span class="nav__name">Keluar</span>
        </a>
    </nav>
</div>
