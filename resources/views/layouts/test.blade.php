<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=7">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="description"content="web explicit">
        <title>Explicit (version dev)</title>

        <link rel="alternate" href="rss.xml" type="application/rss+xml" title="RSS">
        <!-- styles  -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ressource.css') }}" rel="stylesheet">
        <link href="{{ asset('css/formation.css') }}" rel="stylesheet">
        <link href="{{ asset('css/usage.css') }}" rel="stylesheet">
        <link href="{{ asset('css/contact.css') }}" rel="stylesheet">
        <link href="{{ asset('css/test.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
        
        
        @livewireStyles
        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/804c3fbc70.js" ></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        <script src="{{ asset('js/ressource.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/home.js') }}"></script>
        
    </head>

    <body>

    @yield('home')
    
    
    <footer class="pt-8 pb-3">
        <div class="flex">
            <div class="footer-logo pl-8">
                <img src="{{ asset('img/logo/logoblanc.png') }}" class="footer-img-logo" alt="">
            </div>
            <div class="legal ">
                <a class="text-white font-bold" href="">Mention légales</a>
                <p class="text-white">© 2020</p>
            </div>
            <a href="#" id="top">
                <i class="fas fa-chevron-up white-text fa-2x"></i>
            </a>
        </div>
    </footer>


            <!-- Page Content -->
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
        <script src="{{asset('vendor/cookie-consent/js/cookie-consent.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

    </body>
</html>


