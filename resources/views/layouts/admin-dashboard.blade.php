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
  @vite([
    'resources/sass/app.scss',
    'resources/js/app.js'
    ])
    <link href="{{ asset('vendor/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/plugins/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/style.min.css') }}" rel="stylesheet">

</head>

<body class="relative overflow-x-hidden  text-base antialiased bg-white dark:bg-dark-300 font-Inter">
    <!-- header-section start -->
    <div class="two-column_logo d-none gap-3">
        <a href="{{ route('home') }}">
             <img src="{{ asset('images/logo-light.png') }}" class="logo_light" alt="Logo ">
             <img src="{{ asset('images/logo.png') }}" class="logo_dark" alt="Logo">
        </a>
        <span class="material-symbols-outlined close_nav p-1 d-xl-none"> close </span>
     </div>

     <div class="manu-wrapper">
         <!--header-section start-->
         @include('partials.dashboard.header')
         @include('partials.dashboard.sidebar')
     </div>
     <div class="clone_area d-center"></div>
     <!-- header-section end -->

     <!-- main-body start -->
     <div class="main-content">
        @yield('content')
     </div>
     <!-- main end -->


     <!-- Modal -->
     @include('partials.dashboard.modals.liquidity')
     @include('partials.dashboard.modals.token')
     @include('partials.dashboard.modals.connect')
     <!-- Modal -->

     @include('partials.dashboard.footer')



  <script type="text/javascript" src="{{ asset('dashboard/js/plugins/plugins.js') }}"></script>
  <script type="text/javascript" src="//cdn.quilljs.com/1.3.6/quill.js"></script>
  <script type="text/javascript" src="{{ asset('dashboard/js/plugins/apexcharts.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dashboard/js/plugins/custom_apexcharts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dashboard/assets/js/plugins/plugin-custom.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('dashboard/js/main.js') }}"></script>

  @yield('scripts')

</body>

</html>





