<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }}Admin {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

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
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), transparent, rgba(0, 0, 0, 0.7));

        }

        .nav-link.active {
            color: #ffc107 !important;
            font-weight: normal;
        }
    </style>
    @stack('css')
</head>

<body>
    <div id="app">
        @include('admin.layouts.side')
        @include('admin.layouts.navbar', ['class' => 'fixed-top bg-white navbar-light'])

        <main>
            @yield('content')
        </main>
        <footer class="bg-warning text-dark">
            <div class="container pt-3 pb-4">
                &copy; 2023 SLB-B Dharma Asih Pontianak
            </div>
        </footer>
    </div>
    <!-- Tambahkan JavaScript berikut sebelum tag penutup </body> -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        let nav = $('nav');
        let cuurentScrollY = 0
        $(window).on('scroll', e => {
            let scrollY = $(window).scrollTop()
            if (cuurentScrollY > scrollY) {
                $(nav[0]).css('top', 0)
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
