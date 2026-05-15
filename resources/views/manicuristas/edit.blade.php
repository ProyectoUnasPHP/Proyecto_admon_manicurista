@extends('layouts.app')

@section('title', 'Editar Manicurista')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <!-- Back Button -->
            <a href="{{ route('manicuristas.index') }}" class="btn btn-sm btn-outline-secondary mb-4">
                <i class="fas fa-arrow-left me-1"></i> Volver
            </a>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="card-title mb-4 fw-bold">
                        <i class="fas fa-user-edit me-2" style="color: #f39c12;"></i>
                        Editar Manicurista
                    </h3>

                    <form action="{{ route('manicuristas.update', $manicurista) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-semibold">
                                Nombre Completo <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="nombre" name="nombre"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre', $manicurista->usuario->nombre) }}"
                                   placeholder="Ej. Maria García"
                                   required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Correo -->
                        <div class="mb-3">
                            <label for="correo" class="form-label fw-semibold">
                                Correo Electrónico <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="correo" name="correo"
                                   class="form-control @error('correo') is-invalid @enderror"
                                   value="{{ old('correo', $manicurista->usuario->correo) }}"
                                   placeholder="maria@example.com"
                                   required>
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <!-- Especialidad -->
                        <div class="mb-3">
                            <label for="especialidad" class="form-label fw-semibold">
                                Especialidad <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="especialidad" name="especialidad"
                                   class="form-control @error('especialidad') is-invalid @enderror"
                                   value="{{ old('especialidad', $manicurista->especialidad) }}"
                                   placeholder="Ej. Manicura francesa, Pedicura"
                                   required>
                            @error('especialidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-3">
                            <label for="telefono" class="form-label fw-semibold">
                                Teléfono <span class="text-muted">(Opcional)</span>
                            </label>
                            <input type="tel" id="telefono" name="telefono"
                                   class="form-control @error('telefono') is-invalid @enderror"
                                   value="{{ old('telefono', $manicurista->telefono) }}"
                                   placeholder="Ej. +34 123 456 789">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Estado Activo -->
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" id="activo" name="activo"
                                   {{ old('activo', $manicurista->activo) ? 'checked' : '' }}>
                            <label class="form-check-label" for="activo">
                                <strong>Manicurista activa</strong>
                                <small class="text-muted d-block">Desactiva para no mostrar en disponibilidades</small>
                            </label>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 mt-5">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fas fa-check me-2"></i> Guardar Cambios
                            </button>
                            <a href="{{ route('manicuristas.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Cancelar
                            </a>
                        </div>
                    </form>

                    <!-- Info Section -->
                    <hr class="my-4">
                    <div class="alert alert-info alert-sm">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Nota:</strong> Registrada el {{ $manicurista->created_at->format('d/m/Y \a \l\a\s H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
