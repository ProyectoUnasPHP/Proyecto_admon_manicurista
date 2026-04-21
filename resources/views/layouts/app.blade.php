<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Spa') - Sistema de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --navbar-height: 60px;
            --sidebar-bg: #2c3e50;
            --navbar-bg: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            overflow-x: hidden;
            background-color: #f5f7fa;
        }

        /* NAVBAR */
        .navbar-app {
            background-color: var(--navbar-bg);
            border-bottom: 1px solid #e0e0e0;
            height: var(--navbar-height);
            padding: 0 2rem;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1030;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        }

        .navbar-app .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50 !important;
            margin: 0;
            line-height: var(--navbar-height);
        }

        .navbar-app .navbar-brand i {
            margin-right: 0.5rem;
            color: #e74c3c;
        }

        /* SIDEBAR */
        .sidebar-app {
            background-color: var(--sidebar-bg);
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 0;
            z-index: 1020;
            overflow-y: auto;
            margin-top: var(--navbar-height);
        }

        .sidebar-app::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-app::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-app::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-menu {
            list-style: none;
            margin: 0;
            padding: 1rem 0;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .sidebar-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            padding-left: 1.8rem;
        }

        .sidebar-menu a.active {
            background-color: #e74c3c;
            color: white;
            font-weight: 600;
            padding-left: 1.5rem;
            border-left: 4px solid #c0392b;
            padding-left: 1.45rem;
        }

        .sidebar-menu a i {
            width: 1.25rem;
            margin-right: 0.75rem;
            text-align: center;
        }

        .sidebar-menu .menu-label {
            padding: 1.25rem 1.5rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.5);
            letter-spacing: 0.5px;
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--navbar-height);
            min-height: calc(100vh - var(--navbar-height));
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
        }

        .page-header p {
            color: #7f8c8d;
            margin-top: 0.25rem;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            :root {
                --sidebar-width: 200px;
            }

            .sidebar-menu a {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }

            .sidebar-menu a i {
                width: 1rem;
                margin-right: 0.5rem;
            }

            .sidebar-menu .menu-label {
                padding: 1rem 1rem 0.5rem;
            }

            .navbar-app {
                padding: 0 1.5rem;
            }

            .main-content {
                padding: 1.5rem;
            }

            .page-header h1 {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 768px) {
            :root {
                --sidebar-width: 0;
                --navbar-bg: #2c3e50;
            }

            .navbar-app {
                padding: 0 1rem;
                background-color: var(--sidebar-bg);
            }

            .navbar-app .navbar-brand {
                color: #ffffff !important;
            }

            .sidebar-app {
                display: none;
                width: 100%;
                height: auto;
                position: fixed;
                top: var(--navbar-height);
                left: -100%;
                transition: left 0.3s ease;
                z-index: 1010;
            }

            .sidebar-app.show {
                left: 0;
                width: 100%;
            }

            .main-content {
                margin-left: 0;
                padding: 1rem;
            }

            .page-header h1 {
                font-size: 1.5rem;
            }

            .toggle-sidebar-btn {
                display: inline-block !important;
            }

            .navbar-app {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
        }

        .toggle-sidebar-btn {
            display: none;
            background: none;
            border: none;
            color: #2c3e50;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.5rem;
        }

        @media (max-width: 768px) {
            .toggle-sidebar-btn {
                color: white;
            }
        }

        /* ALERTS */
        .alert {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        /* BUTTONS */
        .btn {
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
        }

        .btn-success:hover {
            background-color: #229954;
            border-color: #229954;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        /* TABLES */
        .table {
            background-color: white;
        }

        .table th {
            background-color: #2c3e50;
            color: white;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            padding: 1rem 0.75rem;
        }

        .table td {
            vertical-align: middle;
            padding: 0.95rem 0.75rem;
            border-bottom: 1px solid #ecf0f1;
        }

        .table tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* FORMS */
        .form-label {
            color: #2c3e50;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select,
        .form-check-input {
            border-radius: 6px;
            border: 1px solid #bdc3c7;
            padding: 0.6rem 0.75rem;
            font-size: 0.95rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus,
        .form-check-input:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #e74c3c;
        }

        .invalid-feedback {
            font-size: 0.85rem;
            color: #e74c3c;
        }

        /* BADGES */
        .badge {
            padding: 0.4rem 0.75rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge.bg-success {
            background-color: #27ae60 !important;
        }

        .badge.bg-danger {
            background-color: #e74c3c !important;
        }

        .badge.bg-warning {
            background-color: #f39c12 !important;
        }

        .badge.bg-info {
            background-color: #3498db !important;
        }
    </style>
    @yield('additional_css')
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar-app">
        <button class="toggle-sidebar-btn" id="toggleSidebar" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="navbar-brand">
            <i class="fas fa-spa"></i> Sistema Spa
        </div>
        <div></div>
    </nav>

    <!-- SIDEBAR -->
    <aside class="sidebar-app" id="sidebar">
        <ul class="sidebar-menu">
            <li class="menu-label">Menú Principal</li>
            <li>
                <a href="/" class="@if(request()->is('/')) active @endif">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
            </li>

            <li class="menu-label">Gestión</li>
            <li>
                <a href="{{ route('services.index') }}" class="@if(request()->is('services*')) active @endif">
                    <i class="fas fa-concierge-bell"></i> Servicios
                </a>
            </li>
            <li>
                <a href="#" class="@if(request()->is('categories*')) active @endif">
                    <i class="fas fa-tags"></i> Categorías
                </a>
            </li>
            <li>
                <a href="#" class="@if(request()->is('staff*')) active @endif">
                    <i class="fas fa-user-tie"></i> Personal
                </a>
            </li>
            <li>
                <a href="#" class="@if(request()->is('appointments*')) active @endif">
                    <i class="fas fa-calendar-check"></i> Citas
                </a>
            </li>

            <li class="menu-label">Sistema</li>
            <li>
                <a href="#" class="@if(request()->is('reports*')) active @endif">
                    <i class="fas fa-file-pdf"></i> Reportes
                </a>
            </li>
            <li>
                <a href="#" class="@if(request()->is('settings*')) active @endif">
                    <i class="fas fa-cog"></i> Configuración
                </a>
            </li>
        </ul>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        // Cerrar sidebar al hacer clic en un link (mobile)
        document.querySelectorAll('.sidebar-menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    document.getElementById('sidebar').classList.remove('show');
                }
            });
        });

        // Reajustar sidebar al cambiar el tamaño de la ventana
        window.addEventListener('resize', () => {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth > 768) {
                sidebar.classList.remove('show');
            }
        });
    </script>
    @yield('additional_js')
</body>
</html>
