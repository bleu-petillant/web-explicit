
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>website manager</title>
  <!-- Font Awesome Icons -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css'/>
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @auth
        <div class="image">
        {{-- <img src="{{asset(Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
        <a href="#" class="d-block raleway">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @if(auth()->user()->role_id == 1)
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item my-2 bg-gradient-maroon">
            <a href="{{route('student.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>liste des étudients
            </a>
          </li>
            <li class="nav-item my-2 bg-gradient-indigo">
            <a href="{{route('teacher.index')}}" class="nav-link">
                <i class="nav-icon fas fa-school"></i>liste des professeurs
            </a>
            </li>
            <li class="nav-item my-2 bg-blue">
            <a href="{{route('category.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>liste des catégories
            </a>
          </li>
            <li class="nav-item my-2 bg-fuchsia">
                <a href="{{ route('course.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-laptop-code"></i>liste des cours
                </a>
            </li>
            <li class="nav-item my-2 bg-gradient-orange">
                <a href="{{ route('reference.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>liste des ressources
                </a>
            </li>
            <li class="nav-item my-2 bg-gradient-orange">
                <a href="{{ route('usage.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>liste des cas d' usages
                </a>
            </li>
            <li class="nav-item my-2 bg-gradient-purple mb-2">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-home"></i>aller sur le site web
                </a>
            </li>
            <div class="divide-y divide-fuchsia-300">
                <li class="nav-item my-2 bg-gradient-maroon mt-5">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                        <i class="nav-icon fas fa-cog px-2"></i>gestion du profil
                    </a>
                </li>
                <li class="nav-item my-2 bg-pink-700">
                    <a class="nav-link" href="{{ route('admin.list') }}" :active="request()->routeIs('admin.list')">
                        <i class="nav-icon fas fa-key px-2"></i>gestion des Admins
                    </a>
                </li>
        <li class="nav-item my-2 bg-gradient-dark mt-2">
            <form method="POST" action="{{ route('logout') }}">
                 @csrf
                <a class="nav-link" href="{{ route('logout') }}"
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
            <li class="nav-item my-2 bg-gradient-maroon">
            <a href="{{route('student.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user-graduate"></i>liste des étudients
            </a>
          </li>
            <li class="nav-item my-2 bg-gradient-indigo">
            <a href="{{route('teacher.index')}}" class="nav-link">
                <i class="nav-icon fas fa-school"></i>liste des professeurs
            </a>
            </li>
            <li class="nav-item my-2 bg-fuchsia">
                <a href="{{ route('course.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-laptop-code"></i>liste des cours
                </a>
            </li>
            <li class="nav-item my-2 bg-gradient-orange">
                <a href="{{ route('reference.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>liste des ressources
                </a>
            </li>
            <li class="nav-item my-2 bg-gradient-purple mb-2">
                <a href="{{ route('home') }}" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-home"></i>aller sur le site web
                </a>
            </li>
            <div class="divide-y divide-fuchsia-300">
                <li class="nav-item my-2 bg-gradient-maroon mt-5">
                    <a class="nav-link" href="{{ route('teacher.dashboard') }}" :active="request()->routeIs('teacher.dashboard')">
                        <i class="nav-icon fas fa-cog px-2"></i>gestion du profil
                    </a>
                </li>
        <li class="nav-item my-2 bg-gradient-dark mt-2">
            <form method="POST" action="{{ route('logout') }}">
                 @csrf
                <a class="nav-link" href="{{ route('logout') }}"
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

  <!-- Main Footer -->
  <footer class="main-footer elegant-color">

  </footer>
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
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        $(function () {
            window.scrollTo(0, 0);
            bsCustomFileInput.init();
            
    });
    </script>
</body>
</html>
