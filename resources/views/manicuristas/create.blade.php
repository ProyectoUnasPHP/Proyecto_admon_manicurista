@extends('layouts.app')

@section('title', 'Nueva Manicurista')

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
                        <i class="fas fa-user-plus me-2" style="color: #3498db;"></i>
                        Crear Nueva Manicurista
                    </h3>

                    <form action="{{ route('manicuristas.store') }}" method="POST">
                        @csrf

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-semibold">
                                Nombre Completo <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="nombre" name="nombre"
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   value="{{ old('nombre') }}"
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
                                   value="{{ old('correo') }}"
                                   placeholder="maria@example.com"
                                   required>
                            @error('correo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                Contraseña <span class="text-danger">*</span>
                            </label>
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Mínimo 6 caracteres"
                                   required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">La contraseña debe tener mínimo 6 caracteres</small>
                        </div>

                        <hr class="my-4">

                        <!-- Especialidad -->
                        <div class="mb-3">
                            <label for="especialidad" class="form-label fw-semibold">
                                Especialidad <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="especialidad" name="especialidad"
                                   class="form-control @error('especialidad') is-invalid @enderror"
                                   value="{{ old('especialidad') }}"
                                   placeholder="Ej. Manicura francesa, Pedicura"
                                   required>
                            @error('especialidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="mb-4">
                            <label for="telefono" class="form-label fw-semibold">
                                Teléfono <span class="text-muted">(Opcional)</span>
                            </label>
                            <input type="tel" id="telefono" name="telefono"
                                   class="form-control @error('telefono') is-invalid @enderror"
                                   value="{{ old('telefono') }}"
                                   placeholder="Ej. +34 123 456 789">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 mt-5">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fas fa-check me-2"></i> Crear Manicurista
                            </button>
                            <a href="{{ route('manicuristas.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
