@extends('layouts.app')

@section('title', 'Disponibilidades')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">
                <i class="fas fa-calendar-check me-2" style="color: #27ae60;"></i>
                Gestión de Disponibilidades
            </h1>
            <p class="text-muted small mt-1">Horarios de trabajo de las manicuristas</p>
        </div>
        <a href="{{ route('disponibilidades.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i> Nueva Disponibilidad
        </a>
    </div>

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

    <!-- Table Card -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">Manicurista</th>
                            <th width="20%">Día</th>
                            <th width="15%">Hora Inicio</th>
                            <th width="15%">Hora Fin</th>
                            <th width="20%" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($disponibilidades as $disponibilidad)
                            <tr>
                                <td>
                                    <span class="badge bg-secondary">{{ $disponibilidad->id }}</span>
                                </td>
                                <td>
                                    <strong>{{ $disponibilidad->manicurista->usuario->nombre }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $disponibilidad->manicurista->especialidad }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ ucfirst(\App\Models\Disponibilidad::getDiasSemanales()[$disponibilidad->dia_semana] ?? $disponibilidad->dia_semana) }}
                                    </span>
                                </td>
                                <td>
                                    <i class="fas fa-clock text-primary me-1"></i>
                                    {{ date('H:i', strtotime($disponibilidad->hora_inicio)) }}
                                </td>
                                <td>
                                    <i class="fas fa-clock text-danger me-1"></i>
                                    {{ date('H:i', strtotime($disponibilidad->hora_fin)) }}
                                </td>
                                <td>
                                    <a href="{{ route('disponibilidades.edit', $disponibilidad->id) }}" class="btn btn-outline-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                <form action="{{ route('disponibilidades.destroy', $disponibilidad) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta disponibilidad?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    <i class="fas fa-calendar-times fa-3x mb-3 d-block" style="opacity: 0.3;"></i>
                                    <strong>No hay disponibilidades registradas</strong>
                                    <br>
                                    <small>Comienza agregando una nueva disponibilidad</small>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $disponibilidades->links() }}
    </div>

    <!-- Info Section -->
    <div class="row mt-5">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-lightbulb me-2" style="color: #f39c12;"></i>
                        Información
                    </h5>
                    <p class="mb-0 text-muted small">
                        Las disponibilidades representan los horarios en los que cada manicurista está disponible para atender citas.
                        Puedes crear múltiples franjas horarias por día para mayor flexibilidad en la programación.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
