
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>website manager</title>
    <!-- Font Awesome Icons -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css'/>
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'/>
    <link rel="stylesheet" href="{{asset('admin/css/tag.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @livewireStyles
    <!-- Scripts -->
	
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
    
</head>
<body class="hold-transition sidebar-mini">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

</head>
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    {{--  @livewire('navigation-dropdown')  --}}
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar  elevation-4" style="background-color: #6d7aea;">
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @auth
        <div class="image">
                <a href="{{ route('home') }}">
                    <img class="block w-1/4 admin-logo" src="{{ asset('img/logo/logo_blanc.svg') }}" alt="Workflow">
                </a>
                <p class="d-block raleway text-center text-white underline">{{ Auth::user()->name }}</p>
        </div>
    </div>

    <!-- Sidebar Menu -->
    @if(auth()->user()->role_id == 1)
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item my-2 bg-white ">
                <a href="{{route('student.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-graduate"></i>Liste des étudiants
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{route('teacher.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-school"></i>Liste des professeurs
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{route('category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>Liste des catégories
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('course.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-laptop-code"></i>Liste des formations
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('question.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-question"></i>Liste des questions
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('reference.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>Liste des ressources
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('usage.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>Liste des cas d'usage
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-home"></i>Aller sur le site web
                </a>
            </li>
            <div class="divide-y ">
                <li class="nav-item my-2 bg-white mt-5">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                        <i class="nav-icon fas fa-cog px-2"></i>Gestion du profil
                    </a>
                </li>
                <li class="nav-item my-2 bg-white">
                    <a class="nav-link" href="{{ route('admin.list') }}" :active="request()->routeIs('admin.list')">
                        <i class="nav-icon fas fa-key px-2"></i>Gestion des Admins
                    </a>
                </li>
            <li class="nav-item my-2 bg-gradient-dark mt-2">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt px-2"></i>{{ __('Logout') }}
                    </a>
                </form>
            </li>
        
        </div>
        @elseif(auth()->user()->role_id == 2)
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item my-2 bg-white">
            <a href="{{route('student.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>Liste des étudiants
            </a>
            </li>
            <li class="nav-item my-2 bg-white">
            <a href="{{route('teacher.index')}}" class="nav-link">
                <i class="nav-icon fas fa-school"></i>Liste des professeurs
            </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('course.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-laptop-code"></i>Liste des cours
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('reference.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>Liste des ressources
                </a>
            </li>
            <li class="nav-item my-2 bg-white">
                <a href="{{ route('usage.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-briefcase"></i>Liste des cas d'usages
                </a>
            </li>
            <li class="nav-item my-2 bg-white mb-2">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-home"></i>Aller sur le site web
                </a>
            </li>
            <div class="divide-y ">
                <li class="nav-item my-2 bg-white mt-5">
                    <a class="nav-link" href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')">
                        <i class="nav-icon fas fa-cog px-2"></i>Gestion du profil
                    </a>
                </li>
        <li class="nav-item my-2 bg-gradient-dark mt-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt px-2"></i>{{ __('Logout') }}
                </a>
            </form>
            </li>
        </div>
        @endif
        @endauth
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
    <div class="elegant-color content-wrapper">
        {{ $slot ?? '' }}
        @yield('admin.dashboard')
        @yield('admin.create')
        @yield('admin.student')
        @yield('admin.student.create')
        @yield('admin.student.edit')
        @yield('admin.student.show')
        @yield('admin.course')
        @yield('admin.course.create')
        @yield('scripts')
        @yield('admin.course.edit')
        @yield('admin.category')
        @yield('admin.category.create')
        @yield('admin.category.edit')
        @yield('admin.resources')
        @yield('admin.resources.create')
        @yield('admin.resources.edit')
        @yield('admin.teacher')
        @yield('admin.teacher.create')
        @yield('admin.teacher.edit')
        @yield('admin.questions')
        @yield('admin.questions.create')
        @yield('admin.questions.edit')
        @yield('admin.usage')
        @yield('admin.usage.create')
        @yield('admin.usage.edit')
        @yield('teacher.student')
        @yield('teacher.student.create')
        @yield('teacher.course')
        @yield('teacher.category')
        @yield('teacher.resource')
        @yield('teacher.teacher')
    </div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


</div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.js'></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="crossorigin="anonymous"></script>


<!-- AdminLTE App -->
<script src="{{ asset ('admin/js/adminlte.min.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-tagsinput/1.3.6/jquery.tagsinput.min.js"></script>

@stack('modals')

    @livewireScripts
    <script>
        //var  validate = new ValidateCourseQuestion();
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        
        $(function () {
            window.scrollTo(0, 0);
            bsCustomFileInput.init();
            
    });
    </script>
</body>
</html>
