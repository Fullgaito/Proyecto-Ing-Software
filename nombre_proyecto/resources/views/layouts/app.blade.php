<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        <header class="py-2 bg-body-tertiary border-bottom sticky-top">
            <div class="container">
                <nav class="d-flex flex-wrap align-items-center justify-content-center ">
                    <a class="navbar-brand fs-4 fw-bold" href="{{ route('home') }}">
                        Eventi<span class="text-primary">fy</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li><a href="{{ route('home') }}" class="nav-link px-2 link-body-emphasis">Inicio</a></li>
                            <li><a href="{{route('events')}}" class="nav-link px-2 link-body-emphasis">Explorar</a></li>
                            <li><a href="{{route('events')}}" class="nav-link px-2 link-body-emphasis">Nosotros</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <div class="nav col-lg-auto justify-content-start mb-md-0">
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="btn btn-primary text-white fw-semibold" role="button">Iniciar sesión</a>
                                        </li>
                                    </div>
                                @endif
                            @else
                                <div class="btn-group">
                                    <a href="/dashboard" class="btn btn-primary text-white fw-semibold">
                                        <i class="bi bi-person-circle"></i>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split text-white" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><h6 class="dropdown-header">Eventos</h6></li>
                                        <li><a class="dropdown-item d-flex gap-2 align-items-center" href="dashboard/events"><i class="bi bi-calendar2-plus-fill text-danger"></i> Crear evento</a></li>
                                        <li><a class="dropdown-item d-flex gap-2 align-items-center" href="dashboard/events"><i class="bi bi-calendar2-minus-fill text-danger"></i> Mis eventos</a></li>

                                        <li><hr class="dropdown-divider"></li>
                                        <li><h6 class="dropdown-header">Tickets</h6></li>
                                        <li><a class="dropdown-item d-flex gap-2 align-items-center" href="dashboard/tickets"><i class="bi bi-ticket-fill text-danger"></i> Mis tickets</a></li>

                                        <li><hr class="dropdown-divider"></li>
                                        <li><h6 class="dropdown-header">Cuenta</h6></li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="bi bi-door-closed-fill me-2 text-danger"></i>{{ __('Cerrar sesión') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <main class="flex-fill">
            @yield('content')
        </main>

        <footer class="py-3 border-top">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center">
                <li><a href="#" class="nav-link px-2 link-body-emphasis">Inicio</a></li>
                <li><a href="#" class="nav-link px-2 link-body-emphasis">Explorar</a></li>
                <li><a href="#" class="nav-link px-2 link-body-emphasis">Nosotros</a></li>
            </ul>
            <p class="text-center fw-bold fs-5">Eventi<span class="text-primary">fy</span></p>
        </footer>
    </div>
</body>


    
</html>
