<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistema Spa') - {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --navbar-height: 65px;
            --sidebar-bg: #2c3e50;
            --navbar-bg: #ffffff;
        }
        body { overflow-x: hidden; background-color: #f5f7fa; padding-top: var(--navbar-height); }

        /* NAVBAR INTEGRADO: Aquí vivirá tu botón de Logout */
        .navbar-custom {
            position: fixed; top: 0; left: 0; right: 0;
            height: var(--navbar-height); z-index: 1050;
            background: white; border-bottom: 1px solid #ddd;
        }

        .sidebar-app {
            background-color: var(--sidebar-bg); width: var(--sidebar-width);
            height: 100vh; position: fixed; left: 0; top: 0;
            z-index: 1020; overflow-y: auto; padding-top: var(--navbar-height);
        }
        .sidebar-menu { list-style: none; padding: 1rem 0; }
        .sidebar-menu a { display: flex; align-items: center; padding: 0.75rem 1.5rem; color: rgba(255, 255, 255, 0.8); text-decoration: none; }
        .sidebar-menu a:hover, .sidebar-menu a.active { background-color: #e74c3c; color: white; }
        .sidebar-menu i { width: 20px; margin-right: 10px; }
        .sidebar-menu .menu-label { padding: 1rem 1.5rem 0.5rem; color: rgba(255,255,255,0.4); font-size: 0.7rem; text-transform: uppercase; }

        .main-content { margin-left: var(--sidebar-width); padding: 2rem; min-height: 100vh; }

        @media (max-width: 768px) {
            .sidebar-app { left: -100%; transition: 0.3s; }
            .main-content { margin-left: 0; }
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('additional_css')
</head>
<body class="font-sans antialiased">

    <div class="navbar-custom">
        @include('layouts.navigation')
    </div>

    <aside class="sidebar-app" id="sidebar">
        <ul class="sidebar-menu">
            <li class="menu-label">Menú Principal</li>
            <li><a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}"><i class="fas fa-chart-line"></i> Dashboard</a></li>

            <li class="menu-label">Gestión</li>

            {{-- BLOQUE PROTEGIDO: Solo Admin puede ver Servicios y Manicuristas --}}
            @role('Admin')
            <li>
                <a href="{{ route('services.index') }}" class="@if(request()->is('services*')) active @endif">
                    <i class="fas fa-concierge-bell"></i> Servicios
                </a>
            </li>
            <li>
                <a href="{{ route('manicuristas.index') }}" class="@if(request()->is('manicuristas*')) active @endif">
                    <i class="fas fa-user-tie"></i> Manicuristas
                </a>
            </li>
            @endrole

            {{-- Módulos públicos para Admin y Manicuristas --}}
            <li>
                <a href="{{ route('disponibilidades.index') }}" class="@if(request()->is('disponibilidades*')) active @endif">
                    <i class="fas fa-calendar-check"></i> Disponibilidades
                </a>
            </li>
            <li>
                {{-- Enlace de citas apuntando al listado de disponibilidades --}}
                <a href="{{ route('disponibilidades.index') }}" class="@if(request()->is('appointments*')) active @endif">
                    <i class="fas fa-calendar-alt"></i> Citas
                </a>
            </li>

            {{-- BLOQUE PROTEGIDO: Solo Admin puede ver el Sistema --}}
            @role('Admin')
            <li class="menu-label">Sistema</li>
            <li>
                <a href="{{ route('users.index') }}" class="@if(request()->is('users*')) active @endif">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </li>
            @endrole
        </ul>
    </aside>

    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(isset($slot))
            {{ $slot }}
        @else
            @yield('content')
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('additional_js')
</body>
</html>
