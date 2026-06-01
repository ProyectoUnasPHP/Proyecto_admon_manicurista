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

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total de Servicios</p>
                            <h2 class="fw-bold mb-0" style="color: #3498db;">{{ $totalServices }}</h2>
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
                            <h2 class="fw-bold mb-0" style="color: #27ae60;">{{ $totalAppointments }}</h2>
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

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted small mb-1">Total de Usuarios</p>
                            <h2 class="fw-bold mb-0" style="color: #f39c12;">{{ $totalUsers }}</h2>
                        </div>
                        <div class="p-3 rounded-circle" style="background-color: rgba(243, 156, 18, 0.1);">
                            <i class="fas fa-users fa-2x" style="color: #f39c12;"></i>
                        </div>
                    </div>
                </div>
                <a href="#" class="card-footer bg-light border-0 text-decoration-none text-center py-2 small fw-semibold" style="color: #f39c12;">
                    Ver usuarios <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
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
                        Acciones rápidas
                    </h4>
                    <div class="d-grid gap-2">
                        <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-2"></i> Nuevo Servicio
                        </a>
                        <a href="{{ route('services.index') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-list me-2"></i> Listar Servicios
                        </a>
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

