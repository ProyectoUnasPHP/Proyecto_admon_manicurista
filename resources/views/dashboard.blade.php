@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header mb-4">
        <h1 class="display-5 fw-bold mb-2">
            <i class="fas fa-spa me-2" style="color: #e74c3c;"></i>
            Bienvenida al Sistema de Gestión de Spa
        </h1>
        <p class="text-muted">Aquí puedes gestionar todos los servicios, citas y personal de tu spa</p>
    </div>


    {{-- SLIDER --}}
    <div id="spaSlider" class="carousel slide mb-4 rounded-3 overflow-hidden shadow-sm" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#spaSlider" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#spaSlider" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#spaSlider" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner" style="height: 200px;">
            <div class="carousel-item active" style="height:200px; background: linear-gradient(135deg, #2c3e50, #e74c3c);">
                <div class="d-flex align-items-center justify-content-center h-100 text-white text-center px-4">
                    <div>
                        <h2 class="fw-bold mb-1"><i class="fas fa-spa me-2"></i>Bienvenido al Sistema Spa</h2>
                        <p class="mb-0 opacity-75">Gestiona tu negocio de manicura fácilmente</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:200px; background: linear-gradient(135deg, #e74c3c, #c0392b);">
                <div class="d-flex align-items-center justify-content-center h-100 text-white text-center px-4">
                    <div>
                        <h2 class="fw-bold mb-1"><i class="fas fa-user-tie me-2"></i>Manicuristas</h2>
                        <p class="mb-0 opacity-75">Administra tu equipo y sus disponibilidades</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="height:200px; background: linear-gradient(135deg, #27ae60, #2c3e50);">
                <div class="d-flex align-items-center justify-content-center h-100 text-white text-center px-4">
                    <div>
                        <h2 class="fw-bold mb-1"><i class="fas fa-calendar-check me-2"></i>Citas del día</h2>
                        <p class="mb-0 opacity-75">Revisa y organiza las citas de tus clientes</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#spaSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#spaSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
<div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total de Servicios</p>
                            <h2 class="fw-bold mb-0" style="color: #3498db;">{{ $totalServices ?? 0 }}</h2>
                        </div>
                        <div class="p-3 rounded-circle" style="background-color: rgba(52, 152, 219, 0.1);">
                            <i class="fas fa-concierge-bell fa-2x" style="color: #3498db;"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('services.index') }}" class="card-footer bg-light border-0 text-decoration-none text-center py-2 small fw-semibold" style="color: #3498db;">
                    Ver servicios <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total de Citas</p>
                            <h2 class="fw-bold mb-0" style="color: #27ae60;">{{ $totalAppointments ?? 0 }}</h2>
                        </div>
                        <div class="p-3 rounded-circle" style="background-color: rgba(39, 174, 96, 0.1);">
                            <i class="fas fa-calendar-check fa-2x" style="color: #27ae60;"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="card-footer bg-light border-0 text-decoration-none text-center py-2 small fw-semibold" style="color: #27ae60;">
                    Ver citas <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>

        {{-- AQUI INICIA EL BLOQUEO PARA EL ADMIN --}}
        @role('Admin')
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total de Usuarios</p>
                            <h2 class="fw-bold mb-0" style="color: #f39c12;">{{ $totalUsers ?? 0 }}</h2>
                        </div>
                        <div class="p-3 rounded-circle" style="background-color: rgba(243, 156, 18, 0.1);">
                            <i class="fas fa-users fa-2x" style="color: #f39c12;"></i>
                        </div>
                    </div>
                </div>
                <a href="{{ route('users.index') }}" class="card-footer bg-light border-0 text-decoration-none text-center py-2 small fw-semibold" style="color: #f39c12;">
                    Ver usuarios <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
        @endrole
        {{-- AQUI TERMINA EL BLOQUEO --}}
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-3">
                        <i class="fas fa-info-circle me-2" style="color: #3498db;"></i>
                        ¿Cómo comenzar?
                    </h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex gap-3">
                            <span class="badge bg-primary rounded-circle p-2" style="min-width: 32px; display: flex; align-items: center; justify-content: center;">1</span>
                            <div>
                                <strong>Gestiona tus Servicios:</strong>
                                <p class="text-muted small mb-0">Agrega, edita o elimina los servicios que ofrece tu spa en la sección de servicios.</p>
                            </div>
                        </li>
                        <li class="mb-3 d-flex gap-3">
                            <span class="badge bg-success rounded-circle p-2" style="min-width: 32px; display: flex; align-items: center; justify-content: center;">2</span>
                            <div>
                                <strong>Programa Citas:</strong>
                                <p class="text-muted small mb-0">Crea y organiza las citas de tus clientes de forma fácil y rápida.</p>
                            </div>
                        </li>
                        <li class="d-flex gap-3">
                            <span class="badge bg-warning rounded-circle p-2" style="min-width: 32px; display: flex; align-items: center; justify-content: center;">3</span>
                            <div>
                                <strong>Administra Personal:</strong>
                                <p class="text-muted small mb-0">Gestiona los manicuristas, masajistas y otro personal de tu spa.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-3">
                        <i class="fas fa-bolt me-2" style="color: #f39c12;"></i>
                        Acciones Rápidas
                    </h4>
                    <div class="d-grid gap-2">
                        <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-2"></i> Nuevo Servicio
                        </a>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-list me-2"></i> Listar Servicios
                        </a>
                        <a href="#" class="btn btn-outline-success btn-sm">
                            <i class="fas fa-calendar-plus me-2"></i> Nueva Cita
                        </a>

                        {{-- AQUI INICIA EL SEGUNDO BLOQUEO PARA EL ADMIN --}}
                        @role('Admin')
                        <a href="{{ route('users.create') }}" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-user-plus me-2"></i> Nuevo Usuario
                        </a>
                        @endrole
                        {{-- AQUI TERMINA EL SEGUNDO BLOQUEO --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12) !important;
    }

    .page-header {
        animation: fadeInDown 0.5s ease-in-out;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        overflow: hidden;
    }

    .card-footer a:hover {
        text-decoration: underline !important;
    }
</style>
@endsection
