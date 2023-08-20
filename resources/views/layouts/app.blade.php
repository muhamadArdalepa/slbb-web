<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }}{{ config('app.name', 'SLBB WEB') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/52c63e43bb.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        nav {
            transition: top 150ms ease-in-out
        }

        .bg-gradient-reflect {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), transparent, transparent, rgba(0, 0, 0, 0.7));
        }

        .nav-link.active {
            color: #ffc107 !important;
            font-weight: normal;
        }
    </style>
    @stack('css')
</head>

<body>
    <div id="app" class="{{ $class ?? '' }}">
        @include('layouts.navbar', ['class' => 'fixed-top bg-white navbar-light'])
        @if (Route::currentRouteName() == 'home')
            @include('layouts.navbar', [
                'class' => 'position-absolute top-0 z-2 w-100 bg-transparent navbar-dark color-white',
            ])
        @else
            @include('layouts.navbar', [
                'class' => 'position-absolute top-0 z-2 w-100 bg-white navbar-light color-white',
            ])
        @endif

        <main>
            @yield('content')
        </main>
        <footer class="bg-warning z text-dark">
            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex gap-3 align-items-end mb-3">
                            <img src="{{ asset('images/logo.png') }}" alt="" height="100">
                            <div class="h3 mb-0 lh-1">SLBB<br>Dharma Asih</div>
                        </div>
                        <p style="text-align: justify">SLB-B Dharma Asih Pontianak merupakan
                            sekolah yang diperuntukkan bagi anak-anak
                            penyandang tuna rungu yang berdiri pada
                            tanggal 13 Maret 1972 dibawah naungan
                            Lembaga Pendidikan SLB Dharma Asih Pontianak.</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href=""
                            class="shadow-sm d-inline-flex justify-content-center align-items-center rounded-3 text-decoration-none bg-white "
                            style="height:50px; width:50px;color: #1877F2">
                            <i class="fa-brands fa-facebook-f fa-xl"></i>
                        </a>
                        <a href=""
                            class="shadow-sm d-inline-flex justify-content-center align-items-center rounded-3 text-decoration-none bg-white "
                            style="height:50px; width:50px;color: #F00073">
                            <i class="fa-brands fa-instagram fa-xl"></i>
                        </a>
                    </div>
                </div>
                <div class="text-end small">
                    Terms of License | License | Support
                </div>
            </div>
            <hr class="my-2">
            <div class="container pb-2">
                &copy; 2023 SLB-B Dharma Asih Pontianak
            </div>
        </footer>
    </div>
    <!-- Tambahkan JavaScript berikut sebelum tag penutup </body> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        let nav = $('nav');
        @if (Route::currentRouteName() == 'home')
            $(nav[0]).css('top', -nav[0].offsetHeight - 1)
        @endif
        let cuurentScrollY = 0
        $(window).on('scroll', e => {
            let scrollY = $(window).scrollTop()
            if (scrollY > nav[0].offsetHeight) {
                if (cuurentScrollY > scrollY) {
                    $(nav[0]).css('top', 0)
                } else {
                    $(nav[0]).css('top', -nav[0].offsetHeight - 1)
                }
            } else {
                $(nav[0]).css('top', -nav[0].offsetHeight - 1)

            }
            cuurentScrollY = scrollY
        })
        $(window).on('mousemove', e => {
            if (e.clientY <= nav[0].offsetHeight && cuurentScrollY > nav[0].offsetHeight) {
                $(nav[0]).css('top', 0)
            }
        });
        $('header').css('margin-top', nav[0].offsetHeight)
    </script>
    @stack('js')
</body>

</html>
