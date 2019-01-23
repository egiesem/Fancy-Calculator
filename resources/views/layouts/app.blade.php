<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}}
</head>
<body class="profile-page">
    <!-- Navbar -->
    <!-- End Navbar -->
    <div class="wrapper" id="app">
      <div class="page-header">
      <img src="assets/img/dots.png" class="dots">
      <img src="assets/img/path4.png" class="path">
        {{-- <div class="container"> --}}
            @yield('content')
        {{-- </div> --}}
      </div>
      
    </div>
 
  </body>
</html>
