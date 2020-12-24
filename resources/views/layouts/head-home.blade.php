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
                    <div class="flex">
                        <a href="{{route('home')}}" class="text-sm text-gray-700 underline"><img class="w-1/12 " src="{{ asset('img/logo/logonoir.png') }}" alt=""></a>
                        <a href="{{route('ressources.all')}}" class=" text-sm text-gray-700 underline">Ressources</a>
                        <a href="{{route('formations.all')}}" class="text-sm text-gray-700 underline">Formation Intéractive</a>
                        <a href="{{route('usage')}}" class="text-sm text-gray-700 underline">Cas  d' usage</a>
                        <a href="{{route('contact')}}" class="text-sm text-gray-700 underline">Contact</a>
                    </div>  
                    
                    
                    @else
                    <!-- <div class="flex">
                        <a href="{{route('home')}}" class="text-sm text-gray-700 underline"><img class="w-1/12 " src="{{ asset('img/logo/logonoir.png') }}" alt=""></a>
                        <a href="{{route('ressources.all')}}" class="w-1/12 text-sm text-gray-700 underline">Ressources</a>
                        <a href="{{route('formations.all')}}" class=" w-1/12 text-sm text-gray-700 underline">Formation Intéractive</a>
                        <a href="{{route('usage')}}" class=" w-1/12 text-sm text-gray-700 underline">Cas  d' usage</a>
                        <a href="{{route('contact')}}" class=" w-1/12 text-sm text-gray-700 underline">Contact</a>
                        <a href="{{ route('login') }}" class=" w-1/12 text-sm text-gray-700 underline">se connecter</a>
                    </div> -->

<nav class="">
    <div class="h-16 px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <!-- Icon when menu is closed. -->
                <!--
                    Heroicon name: menu

                    Menu open: "hidden", Menu closed: "block"
                -->
                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <!-- Icon when menu is open. -->
                <!--
                    Heroicon name: x

                    Menu open: "block", Menu closed: "hidden"
                -->
                <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">
            <img class="block lg:hidden w-1/12 w-auto" src="{{ asset('img/logo/logonoir.png') }}" alt="Workflow">
            <img class="hidden lg:block w-1/12 w-auto" src="{{ asset('img/logo/logonoir.png') }}" alt="Workflow">
        </div>
    </div>
    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
            <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{route('ressources.all')}}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Ressources</a>
                <a href="{{route('formations.all')}}" class="text-gray px-3 py-2 rounded-md text-sm font-medium">Formation Intéractive</a>
                <a href="{{route('usage')}}" class="text-gray px-3 py-2 rounded-md text-sm font-medium">Cas d'usage</a>
                <a href="{{route('contact')}}" class="text-gray px-3 py-2 rounded-md text-sm font-medium">Contact</a>
            </div>
        <!-- Profile dropdown -->
        <div class="ml-3 relative">
                <div>
                    <button class=" flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                        <span class="sr-only">Open user menu</span>
                        <i class="main-color-text text-xl fas fa-user"></i>
                    </button>
                </div>

            </div>

        </div>

    </div>
</div>

    <!--
        Mobile menu, toggle classes based on menu state.

        Menu open: "block", Menu closed: "hidden"
    -->
    <div class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
        </div>
    </div>

</nav>
                        
                    @endif
            @endif
        
        @yield('home')
        @yield('resources')
        @livewireScripts
    </body>

    <footer>
        <div class="flex">
            <div class="footer-logo">
                <img src="{{ asset('img/logo/logoblanc.png') }}" class="w-1/12" alt="">
            </div>
            <div class="legal">
                <a class="text-white" href="">mention légales</a>
                <p class="text-white">© 2020</p>
            </div>
            <a href="#" id="top">
                <i class="fas fa-chevron-up white-text fa-2x"></i>
            </a>
        </div>
    

    </footer>

    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script>
        $( document ).ready(function(){

            $("#searchBar").on('keydown',function(e){

                if( $(this).val().length > 1 ) { 
                    $('.news-ressource-cards').slick({
                        infinite: true,
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        arrows: false,
                        adaptiveHeight: true,
                        dots: false,
                    });
            
        }

                });

        });

    </script>
</html>
