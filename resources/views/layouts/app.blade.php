<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
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
                @yield('course')
                @yield('usage')
                @yield('contact')
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
