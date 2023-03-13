<header id="header" class="header-section">
    <div class="container">
        <nav class="navbar ">
            <a href="{{ url('/') }}" class="navbar-brand"><img src="{{ asset('assets/images/logo.png') }}" alt="" height="55"></a>
            <div class="d-flex menu-wrap">
                <div id="mainmenu" class="mainmenu">
                    <ul class="nav">
                        <li><a class="nav-link active" href="{{ url('/') }}">Beranda</a></li>
                        <li><a class="nav-link" href="https://drive.google.com/file/d/1DIT7gkmLmhfJNM2pjgl577mUPkKd_DCU/view?usp=sharing" target="_blank">Download Aplikasi</a></li>
                        <li><a href="{{ route('register') }}"> Daftar</a></li>
                        <li><a href="{{ route('login') }}"><i class="fas fa-user"></i> Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
