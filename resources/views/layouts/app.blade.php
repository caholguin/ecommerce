{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <x-jet-banner />
        @livewire('navigation-menu')

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5">
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/plantilla/bootstrap.min.css')}}" rel="stylesheet">
      
    <!-- helper class css -->
    <link href="{{asset('css/plantilla/helper.min.css')}}" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{asset('css/plantilla/plugins.css')}}" rel="stylesheet">
    <!-- Main Style CSS -->
    <link href="{{asset('css/plantilla/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/plantilla/skin-default.css')}}" rel="stylesheet" id="galio-skin">


     <!-- Font-Awesome CSS -->
     {{-- <script src="https://kit.fontawesome.com/adb90ca2b0.js" crossorigin="anonymous"></script> --}}
     <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">  

    @livewireStyles
    <title>Ecommerce</title>
</head>
<body>
    @livewire('navegacion')

    @livewireScripts

      <!--All jQuery, Third Party Plugins & Activation (main.js) Files-->
      <script src="{{asset('js/plantilla/vendor/modernizr-3.6.0.min.js')}}"></script>
      <!-- Jquery Min Js -->
      <script src="{{asset('js/plantilla/vendor/jquery-3.3.1.min.js')}}"></script>
      <!-- Popper Min Js -->
      <script src="{{asset('js/plantilla/vendor/popper.min.js')}}"></script>
      <!-- Bootstrap Min Js -->
      <script src="{{asset('js/plantilla/vendor/bootstrap.min.js')}}"></script>
      <!-- Plugins Js-->
      <script src="{{asset('js/plantilla/plugins.js')}}"></script>
      <!-- Ajax Mail Js -->
      <script src="{{asset('js/plantilla/ajax-mail.js')}}"></script>
      <!-- Active Js -->
      <script src="{{asset('js/plantilla/main.js')}}"></script>
      <!-- Switcher JS [Please Remove this when Choose your Final Projct] -->
      <script src="{{asset('js/plantilla/switcher.js')}}"></script>
</body>
</html>
