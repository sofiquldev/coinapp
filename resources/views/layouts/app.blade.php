<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coin App') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!--Meta For No Index-->
    <meta name="robots" content="noindex, Nofollow, Noimageindex">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('images/favicons/favicon.png') }}" type="image/png">
    <link rel="icon" href="{{ asset('images/favicons/favicon.png') }}" type="image/png">


    <!-- Scripts -->
    <link href="{{ asset('vendor/fontawesome/all.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fancybox/fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/swiper/swiper.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="relative overflow-x-hidden  text-base antialiased bg-white dark:bg-dark-300 font-Inter">
    @include('partials.app.dark-mode-toggler')

    @yield('content')

    <input type="hidden" id="open-btn">
    <input type="hidden" id="ok-btn">


    <script type="text/javascript" src="{{ asset('vendor/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/fancybox/fancybox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/gsap/gsap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/gsap/motionpath.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/swiper/swiper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>

</html>
