<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/DataTables/datatables.min.css') }}" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/connect.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark_theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

</head>

<body>

    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>

    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <div class="page-sidebar">
            <div class="logo-box"><a href="{{ route('home') }}" class="logo-text">Connect</a><a href="#" id="sidebar-close"><i
                        class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i
                        class="material-icons">adjust</i><i
                        class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
            <div class="page-sidebar-inner slimscroll">

                @guest
                    @if (Route::has('login'))
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <ul class="accordion-menu">
                        <li>
                            <a href="{{ route('home') }}" class="active"><i
                                    class="material-icons-outlined">dashboard</i>Dashboard</a>
                        </li>
                        <li class="sidebar-title">
                            Manajemen Data Umum
                        </li>
                        <li>
                            <a href="{{ route('pengeluaran-umum.index') }}"><i class="material-icons-outlined">inbox</i>Data Umum</a>
                        </li>

                        <li class="sidebar-title">
                            Manajemen Kolam
                        </li>
                        <li>
                            <a href="{{ route('kolam.index') }}"><i class="material-icons-outlined">inbox</i>Data Kolam</a>
                        </li>
                        <li>
                            <a href="{{ route('pemasukan-ikan.index') }}"><i class="material-icons-outlined">inbox</i>Pemasukan</a>
                        </li>
                        <li>
                            <a href="{{ route('pengeluaran-ikan.index') }}"><i class="material-icons-outlined">inbox</i>Pengeluaran</a>
                        </li>

                        <li class="sidebar-title">
                            Manajemen Keratom
                        </li>
                        <li>
                            <a href="{{ route('pemasukan-keratom.index') }}"><i class="material-icons-outlined">inbox</i>Pemasukan</a>
                        </li>
                        <li>
                            <a href="{{ route('pengeluaran-keratom.index') }}"><i class="material-icons-outlined">inbox</i>Pengeluaran</a>
                        </li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                @endguest

            </div>
        </div>
        <div class="page-container">
            <div class="page-header">
                <nav class="navbar navbar-expand">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    @guest
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item small-screens-sidebar-link">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">menu</i></a>
                            </li>
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../assets/images/avatars/profile-image-1.png" alt="profile image">
                                    <span>{{ Auth::user()->name }}</span><i
                                        class="material-icons dropdown-icon">keyboard_arrow_down</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('pengeluaran-umum.index') }}">Data Umum</a>
                                    <a class="dropdown-item" href="{{ route('kolam.index') }}">Data Kolam</a>
                                    <a class="dropdown-item" href="{{ route('pemasukan-ikan.index') }}">Pemasukan Kolam</a>
                                    <a class="dropdown-item" href="{{ route('pengeluaran-ikan.index') }}">Pengeluaran Kolam</a>
                                    <a class="dropdown-item" href="{{ route('pemasukan-keratom.index') }}">Pemasukan Keratom</a>
                                    <a class="dropdown-item" href="{{ route('pengeluaran-keratom.index') }}">Pengeluaran Keratom</a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="material-icons-outlined">mail</i></a>
                            </li>
                        </ul>
                    @endguest

                </nav>
            </div>
            <div class="page-content">
                <div class="main-wrapper">

                    @yield('content')

                </div>
            </div>
            <div class="page-footer">
                <div class="row">
                    <div class="col-md-12">
                        <span class="footer-text">2019 © stacks</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/blockui/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.time.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.symbol.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.resize.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('assets/js/connect.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/connect.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>

    @stack('javascript-plugins')

</body>

</html>
