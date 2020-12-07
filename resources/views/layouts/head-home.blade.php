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
        <link href="{{ asset('css/header.css') }}" rel="stylesheet">
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
    </head>
    <body class="antialiased">
        <div>

            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    
                    <a href="{{route('resources.index')}}" class="text-sm text-gray-700 underline">resources</a>

                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">se connecter</a>


                    @endif
                </div>
            @endif

        </div>
        @yield('home')
        @livewireScripts
    </body>

    <footer>

    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
</html>
