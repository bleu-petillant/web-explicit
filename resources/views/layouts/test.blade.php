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

    <!-- menu connecté  -->
    @if (Route::has('login'))
        @auth

            <header>
                    <a class="brand" href="{{route('home')}}">
                        <img class=" logo w-auto" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow">
                    </a>

                    <nav class="actions" role="navigation">  
                        <div class="menu-link">
                        @if ( request()->routeIs('ressources.all'))
                            <a class="current-page" href="{{route('ressources.all')}}">Ressources</a>
                        @else
                            <a class="text-gray" href="{{route('ressources.all')}}">Ressources</a>
                        @endif

                        @if ( request()->routeIs('formations.all'))
                            <a class="current-page" href="{{route('formations.all')}}">Formations interactives</a>
                        @elseif ( request()->routeIs('ressources.private'))
                            <a class="current-page" href="{{route('formations.all')}}">Formations interactives</a>
                        @else
                            <a class="text-gray" href="{{route('formations.all')}}">Formations interactives</a>
                        @endif

                        @if ( request()->routeIs('usage'))
                            <a class="current-page"  href="{{route('usage')}}">Cas d'usage</a>
                        @else   
                            <a class="text-gray"  href="{{route('usage')}}">Cas d'usage</a>
                        @endif

                        @if ( request()->routeIs('contact'))
                            <a class="current-page"  href="{{route('contact')}}">Contact</a>
                        @else
                            <a class="text-gray"  href="{{route('contact')}}">Contact</a>
                        @endif

                            <div class="li-navigation-dropdown">
                                <button class="  text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                </button>
                                    <div class="sm:flex sm:items-center sm:ml-6">
                                        <x-jet-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out py-2">
                                                        <div class="auth-nav-name">{{ Auth::user()->name }}</div>
                                                        <div class="ml-1">
                                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </button>

                                            </x-slot>

                                            <x-slot name="content">
                                                <!-- Account Management -->
                                                @if (auth()->user()->role_id == 1)
                                                <x-jet-dropdown-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                                    {{ __('Dashboard') }}
                                                </x-dropdown-link>
                                                        @elseif(auth()->user()->role_id == 2)
                                                <x-jet-dropdown-link href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')">
                                                    {{ __('Dashboard') }}
                                                </x-jet-dropdown-link>
                                                @endif
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Account') }}
                                                </div>
                                                @if(auth()->user()->role_id == 1)
                                                <x-jet-dropdown-link href="{{ route('admin.dashboard') }}">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>
                                                @elseif(auth()->user()->role_id == 2)
                                                <x-jet-dropdown-link href="{{ route('teacher.dashboard') }}">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>
                                                @else
                                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                    {{ __('Profile') }}
                                                </x-jet-dropdown-link>
                                                @endif
                                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                        {{ __('API Tokens') }}
                                                    </x-jet-dropdown-link>
                                                @endif

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Management -->
                                                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Team') }}
                                                    </div>

                                                    <!-- Team Settings -->
                                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                        {{ __('Team Settings') }}
                                                    </x-jet-dropdown-link>

                                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                            {{ __('Create New Team') }}
                                                        </x-jet-dropdown-link>
                                                    @endcan

                                                    <div class="border-t border-gray-100"></div>

                                                    <!-- Team Switcher -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Switch Teams') }}
                                                    </div>

                                                    @foreach (Auth::user()->allTeams() as $team)
                                                        <x-jet-switchable-team :team="$team" />
                                                    @endforeach

                                                    <div class="border-t border-gray-100"></div>
                                                @endif

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                        {{ __('Logout') }}
                                                    </x-jet-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-jet-dropdown>
                    
                                </div>
                            </div>                   
                        </div>
                    </nav>

                    <nav class="mobile-menu" role="navigation">
                        <div id="menuToggle">
                            <input type="checkbox">
                            <span class="up-span"></span>
                            <span class="middle-span"></span>
                            <span class="down-span"></span>
                            <ul id="menu">
                            @if ( request()->routeIs('ressources.all'))
                                <li><p class="text-center"><a class="text-black" href="{{route('ressources.all')}}">Ressources</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white" href="{{route('ressources.all')}}">Ressources</a></p></li>
                            @endif

                            @if ( request()->routeIs('formations.all'))
                                <li><p class="text-center"><a class="text-black" href="{{route('formations.all')}}">Formations interactives</a></p></li>
                            @elseif ( request()->routeIs('ressources.private'))
                                <li><p class="text-center"><a class="text-black" href="{{route('formations.all')}}">Formations interactives</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white" href="{{route('formations.all')}}">Formations interactives</a></p></li>
                            @endif

                            @if ( request()->routeIs('usage'))
                                <li><p class="text-center"><a class="text-black"  href="{{route('usage')}}">Cas d'usage</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white"  href="{{route('usage')}}">Cas d'usage</a></p></li>
                            @endif

                            @if ( request()->routeIs('contact'))
                                <li><p class="text-center"><a class="text-black"  href="{{route('contact')}}">Contact</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white"  href="{{route('contact')}}">Contact</a></p></li>
                            @endif

                                <div class="li-navigation-dropdown">
                                    <button class="  text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                    </button>
                                        <div class="sm:flex sm:items-center sm:ml-6 content-dropdown">
                                            <x-jet-dropdown width="48">
                                                <x-slot name="trigger">
                                                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out py-2">
                                                            <div class="auth-nav-name">{{ Auth::user()->name }}</div>
                                                            <div class="ml-1">
                                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                        </button>

                                                </x-slot>

                                                <x-slot name="content">
                                                    <!-- Account Management -->
                                                    @if (auth()->user()->role_id == 1)
                                                    <x-jet-dropdown-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                                        {{ __('Dashboard') }}
                                                    </x-dropdown-link>
                                                            @elseif(auth()->user()->role_id == 2)
                                                    <x-jet-dropdown-link href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')">
                                                        {{ __('Dashboard') }}
                                                    </x-jet-dropdown-link>
                                                    @endif
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Account') }}
                                                    </div>
                                                    @if(auth()->user()->role_id == 1)
                                                    <x-jet-dropdown-link href="{{ route('admin.dashboard') }}">
                                                        {{ __('Profile') }}
                                                    </x-jet-dropdown-link>
                                                    @elseif(auth()->user()->role_id == 2)
                                                    <x-jet-dropdown-link href="{{ route('teacher.dashboard') }}">
                                                        {{ __('Profile') }}
                                                    </x-jet-dropdown-link>
                                                    @else
                                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                        {{ __('Profile') }}
                                                    </x-jet-dropdown-link>
                                                    @endif
                                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                            {{ __('API Tokens') }}
                                                        </x-jet-dropdown-link>
                                                    @endif

                                                    <div class="border-t border-gray-100"></div>

                                                    <!-- Team Management -->
                                                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            {{ __('Manage Team') }}
                                                        </div>

                                                        <!-- Team Settings -->
                                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                            {{ __('Team Settings') }}
                                                        </x-jet-dropdown-link>

                                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                                {{ __('Create New Team') }}
                                                            </x-jet-dropdown-link>
                                                        @endcan

                                                        <div class="border-t border-gray-100"></div>

                                                        <!-- Team Switcher -->
                                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                                            {{ __('Switch Teams') }}
                                                        </div>

                                                        @foreach (Auth::user()->allTeams() as $team)
                                                            <x-jet-switchable-team :team="$team" />
                                                        @endforeach

                                                        <div class="border-t border-gray-100"></div>
                                                    @endif

                                                    <!-- Authentication -->
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                            onclick="event.preventDefault();
                                                                                        this.closest('form').submit();">
                                                            {{ __('Logout') }}
                                                        </x-jet-dropdown-link>
                                                    </form>
                                                </x-slot>
                                            </x-jet-dropdown>
                        
                                    </div>
                                </div>  
                            </ul>
                        </div>
                    </nav>
                

            </header>

    @else

            <header>
                    <a class="brand" href="{{route('home')}}">
                        <img class=" logo w-auto" src="{{ asset('img/logo/logo_couleur.svg') }}" alt="Workflow">
                    </a>

                    <nav class="actions" role="navigation">  
                        <div class="menu-link">
                        @if ( request()->routeIs('ressources.all'))
                            <a class="current-page" href="{{route('ressources.all')}}">Ressources</a>
                        @else
                            <a class="text-gray" href="{{route('ressources.all')}}">Ressources</a>
                        @endif

                        @if ( request()->routeIs('formations.all'))
                            <a class="current-page" href="{{route('formations.all')}}">Formations interactives</a>
                        @elseif ( request()->routeIs('ressources.private'))
                            <a class="current-page" href="{{route('formations.all')}}">Formations interactives</a>
                        @else
                            <a class="text-gray" href="{{route('formations.all')}}">Formations interactives</a>
                        @endif

                        @if ( request()->routeIs('usage'))
                            <a class="current-page"  href="{{route('usage')}}">Cas d'usage</a>
                        @else   
                            <a class="text-gray"  href="{{route('usage')}}">Cas d'usage</a>
                        @endif

                        @if ( request()->routeIs('contact'))
                            <a class="current-page"  href="{{route('contact')}}">Contact</a>
                        @else
                            <a class="text-gray"  href="{{route('contact')}}">Contact</a>
                        @endif
                            <a href="{{route('login')}}"><i class="connexion-icon text-xl fas fa-user"></i></a>                    
                        </div>
                    </nav>

                    <nav class="mobile-menu" role="navigation">
                        <div id="menuToggle">
                            <input type="checkbox">
                            <span class="up-span"></span>
                            <span class="middle-span"></span>
                            <span class="down-span"></span>
                            <ul id="menu">
                            @if ( request()->routeIs('ressources.all'))
                                <li><p class="text-center"><a class="text-black" href="{{route('ressources.all')}}">Ressources</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white" href="{{route('ressources.all')}}">Ressources</a></p></li>
                            @endif

                            @if ( request()->routeIs('formations.all'))
                                <li><p class="text-center"><a class="text-black" href="{{route('formations.all')}}">Formations interactives</a></p></li>
                            @elseif ( request()->routeIs('ressources.private'))
                                <li><p class="text-center"><a class="text-black" href="{{route('formations.all')}}">Formations interactives</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white" href="{{route('formations.all')}}">Formations interactives</a></p></li>
                            @endif

                            @if ( request()->routeIs('usage'))
                                <li><p class="text-center"><a class="text-black"  href="{{route('usage')}}">Cas d'usage</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white"  href="{{route('usage')}}">Cas d'usage</a></p></li>
                            @endif

                            @if ( request()->routeIs('contact'))
                                <li><p class="text-center"><a class="text-black"  href="{{route('contact')}}">Contact</a></p></li>
                            @else
                                <li><p class="text-center"><a class="text-white"  href="{{route('contact')}}">Contact</a></p></li>
                            @endif

                            <li><p class="text-center"><a href="{{route('login')}}"><i class="connexion-icon text-xl fas fa-user"></i></a></p></li>   
                            </ul>
                        </div>
                    </nav>
                

            </header>


        @endif
    @endif

            
    @yield('test')

    @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
        <script src="{{asset('vendor/cookie-consent/js/cookie-consent.js')}}"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

    </body>
</html>


