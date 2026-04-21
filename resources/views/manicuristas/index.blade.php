@extends('layouts.app')

@section('title', 'Manicuristas')

@section('content')
<div class="container-fluid">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">
                <i class="fas fa-user-tie me-2" style="color: #e74c3c;"></i>
                Gestión de Manicuristas
            </h1>
            <p class="text-muted small mt-1">Administra el personal de tu spa</p>
        </div>
        <a href="{{ route('manicuristas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Nueva Manicurista
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

    <!-- Cards Grid -->
    <div class="row g-4">
        @forelse($manicuristas as $manicurista)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm h-100" style="transition: all 0.3s ease;">
                    <div class="card-body">
                        <!-- Header Card -->
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 rounded-circle" style="background-color: rgba(231, 76, 60, 0.1);">
                                    <i class="fas fa-user fa-lg" style="color: #e74c3c;"></i>
                                </div>
                                <div>
                                    <h5 class="card-title mb-0">{{ $manicurista->usuario->nombre }}</h5>
                                    <p class="text-muted small mb-0">{{ $manicurista->especialidad }}</p>
                                </div>
                            </div>
                            @if($manicurista->activo)
                                <span class="badge bg-success">Activa</span>
                            @else
                                <span class="badge bg-secondary">Inactiva</span>
                            @endif
                        </div>

                        <!-- Info -->
                        <div class="mb-3">
                            <p class="small text-muted mb-1">
                                <i class="fas fa-envelope me-2"></i>
                                {{ $manicurista->usuario->correo }}
                            </p>
                            @if($manicurista->telefono)
                                <p class="small text-muted mb-1">
                                    <i class="fas fa-phone me-2"></i>
                                    {{ $manicurista->telefono }}
                                </p>
                            @endif
                            <p class="small text-muted">
                                <i class="fas fa-calendar me-2"></i>
                                Registrada: {{ $manicurista->created_at->format('d/m/Y') }}
                            </p>
                        </div>

                        <!-- Disponibilidades Count -->
                        <div class="alert alert-info alert-sm mb-3 py-2 small">
                            <i class="fas fa-clock me-1"></i>
                            <strong>{{ $manicurista->disponibilidades->count() }}</strong> disponibilidades registradas
                        </div>
                    </div>

                    <!-- Card Footer Actions -->
                    <div class="card-footer bg-light border-0">
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('manicuristas.edit', $manicurista) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('manicuristas.destroy', $manicurista) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Eliminar esta manicurista? Se eliminarán todas sus disponibilidades.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm text-center py-5">
                    <div class="card-body">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="card-title">No hay manicuristas registradas</h5>
                        <p class="text-muted">Comienza agregando una nueva manicurista al sistema</p>
                        <a href="{{ route('manicuristas.create') }}" class="btn btn-primary mt-2">
                            <i class="fas fa-plus me-2"></i> Nueva Manicurista
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $manicuristas->links() }}
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12) !important;
    }

    .alert-sm {
        font-size: 0.85rem;
        margin-bottom: 0;
    }
</style>
@endsection
