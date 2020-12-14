<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/ressource.css') }}" rel="stylesheet">
        <link href="{{ asset('css/header.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.css' />
        <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
         <script src="https://kit.fontawesome.com/804c3fbc70.js" ></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/home.js') }}"></script>
        <script src="{{ asset('js/ressource.js') }}"></script>
        @livewireStyles
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <a href="{{route('home')}}" class="text-sm text-gray-700 underline">Home</a>
                        <a href="{{route('ressources.all')}}" class="text-sm text-gray-700 underline">Ressources</a>
                        <a href="{{route('formations.all')}}" class="text-sm text-gray-700 underline">Formation Intéractive</a>
                        <a href="{{route('usage')}}" class="text-sm text-gray-700 underline">Cas  d' usage</a>
                        <a href="{{route('contact')}}" class="text-sm text-gray-700 underline">Contact</a>
                       
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
                @yield('resources')
                @yield('home')
                @yield('allcourse')
                @yield('usage')
                @yield('contact')
                @yield('mentions')
                @yield('polices')

            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
        <script src="{{asset('vendor/cookie-consent/js/cookie-consent.js')}}"></script>
    </body>
</html>
