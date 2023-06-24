<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/52c63e43bb.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil Sekolah
                                </a>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Sejarah Singkat</a></li>
                                <li><a class="dropdown-item" href="#">Visi Misi</a></li>
                                <li><a class="dropdown-item" href="#">Sarana Prasarana</a></li>
                                <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="#">Guru dan Staff</a></li>
                                <li><a class="dropdown-item" href="#">Kurikulum</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

        @auth
            
        <footer class="bg-dark text-white">
            <div class="container pt-4 pb-2">
                <div class="d-flex  gap-5">
                    <div class="">
                        <img class="" src="https://4.bp.blogspot.com/-GRXmXkNzzbs/Tnqvms5FIlI/AAAAAAAAALY/pHOiV92Oklc/s1600/Logo+POLNEP.png" alt="" height="100">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Tentang kami</h4>
                            <div>Politeknik Negeri Pontianak (POLNEP) merupakan sistem Pendidikan Tinggi jalur profesional yang menekankan penguasaan dan pengembangan Ilmu Pengetahuan dan Teknologi untuk mendukung era industrialisasi.</div>
                        </div>
                        <div class="col-md-3">
                            <h4>Informasi Kontak</h4>
                            <div class="">Jl. Jenderal Ahmad Yani, Bansir Laut, Pontianak Tenggara, Kota Pontianak, Kalimantan Barat</div>
                            <div>78124</div>
                        </div>
                        <div class="col-md-3">
                            <h4>Ikuti kami</h4>
                            <div><i class="fa-brands fa-facebook"></i> &nbsp;SLB-B Dharma Asih</div>
                            <div><i class="fa-brands fa-instagram"></i> &nbsp;SLB-B Dharma Asih Pontianak</div>
                            <div><i class="fa-brands fa-twitter"></i> &nbsp;SLBB Dharma Asih</div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="border-white">
            <div class="container pt-3 pb-4">
                &copy; 2023 SLB-B Dharma Asih Pontianak 
            </div>
        </footer>
        @endauth

    </div>
</body>
</html>
