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
        <link rel="alternate" href="rss.xml" type="application/rss+xml" title="RSS">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ressource.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.css' />
        <script src="{{ asset('js/app.js') }}"></script>
        <title>Explicit (version dev)</title>
        @livewireStyles
        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/804c3fbc70.js" ></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/home.js') }}"></script>
        <script src="{{ asset('js/ressource.js') }}"></script>
    </head>
    <body class="antialiased">
       
            @if (Route::has('login'))
                    @auth
                    @livewire('navigation-dropdown')  
                    <a href="{{route('home')}}" class="text-sm text-gray-700 underline">Home</a>
                        <a href="{{route('ressources.all')}}" class="text-sm text-gray-700 underline">Ressources</a>
                        <a href="{{route('formations.all')}}" class="text-sm text-gray-700 underline">Formation Intéractive</a>
                        <a href="{{route('usage')}}" class="text-sm text-gray-700 underline">Cas  d' usage</a>
                        <a href="{{route('contact')}}" class="text-sm text-gray-700 underline">Contact</a>
                    
                    @else
                    <a href="{{route('home')}}" class="text-sm text-gray-700 underline">Home</a>
                        <a href="{{route('ressources.all')}}" class="text-sm text-gray-700 underline">Ressources</a>
                        <a href="{{route('formations.all')}}" class="text-sm text-gray-700 underline">Formation Intéractive</a>
                        <a href="{{route('usage')}}" class="text-sm text-gray-700 underline">Cas  d' usage</a>
                        <a href="{{route('contact')}}" class="text-sm text-gray-700 underline">Contact</a>
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">se connecter</a>
                    @endif
            @endif
           
        
        @yield('home')
        @yield('resources')
        @livewireScripts
    </body>

    <footer>
        <div>
            <div class="footer-logo">
                <img src="" class="" alt="">
            </div>
            <div class="legal">
                <a href="">mention légales</a>
                <p>© 2020</p>
            </div>
            <div class="up">

            </div>
        </div>
    

    </footer>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</html>
