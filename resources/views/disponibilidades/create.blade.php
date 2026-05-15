@extends('layouts.app')

@section('title', 'Nueva Disponibilidad')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <!-- Back Button -->
            <a href="{{ route('disponibilidades.index') }}" class="btn btn-sm btn-outline-secondary mb-4">
                <i class="fas fa-arrow-left me-1"></i> Volver
            </a>

            <!-- Form Card -->
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <h3 class="card-title mb-4 fw-bold">
                        <i class="fas fa-calendar-plus me-2" style="color: #27ae60;"></i>
                        Nueva Disponibilidad
                    </h3>

                    <form action="{{ route('disponibilidades.store') }}" method="POST">
                        @csrf

                        <!-- Manicurista Select -->
                        <div class="mb-3">
                            <label for="id_manicurista" class="form-label fw-semibold">
                                Manicurista <span class="text-danger">*</span>
                            </label>
                            <select id="id_manicurista" name="id_manicurista"
                                    class="form-select @error('id_manicurista') is-invalid @enderror"
                                    required>
                                <option value="">-- Selecciona una manicurista --</option>
                                @foreach($manicuristas as $manicurista)
                                    <option value="{{ $manicurista->id }}"
                                            {{ old('id_manicurista') == $manicurista->id ? 'selected' : '' }}>
                                        {{ $manicurista->usuario->nombre }} ({{ $manicurista->especialidad }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_manicurista')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Día Semana Select -->
                        <div class="mb-3">
                            <label for="dia_semana" class="form-label fw-semibold">
                                Día de la Semana <span class="text-danger">*</span>
                            </label>
                            <select id="dia_semana" name="dia_semana"
                                    class="form-select @error('dia_semana') is-invalid @enderror"
                                    required>
                                <option value="">-- Selecciona un día --</option>
                                @foreach($dias as $key => $nombre)
                                    <option value="{{ $key }}"
                                            {{ old('dia_semana') == $key ? 'selected' : '' }}>
                                        {{ $nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dia_semana')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr class="my-4">

                        <!-- Hora Inicio -->
                        <div class="mb-3">
                            <label for="hora_inicio" class="form-label fw-semibold">
                                Hora de Inicio <span class="text-danger">*</span>
                            </label>
                            <input type="time" id="hora_inicio" name="hora_inicio"
                                   class="form-control @error('hora_inicio') is-invalid @enderror"
                                   value="{{ old('hora_inicio') }}"
                                   required>
                            @error('hora_inicio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Formato: HH:MM (ej: 09:00)</small>
                        </div>

                        <!-- Hora Fin -->
                        <div class="mb-4">
                            <label for="hora_fin" class="form-label fw-semibold">
                                Hora de Fin <span class="text-danger">*</span>
                            </label>
                            <input type="time" id="hora_fin" name="hora_fin"
                                   class="form-control @error('hora_fin') is-invalid @enderror"
                                   value="{{ old('hora_fin') }}"
                                   required>
                            @error('hora_fin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Debe ser posterior a la hora de inicio</small>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 mt-5">
                            <button type="submit" class="btn btn-success flex-grow-1">
                                <i class="fas fa-check me-2"></i> Crear Disponibilidad
                            </button>
                            <a href="{{ route('disponibilidades.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info -->
            <div class="alert alert-info mt-4" role="alert">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Nota:</strong> Solo aparecen las manicuristas marcadas como activas.
            </div>
        </div>
    </div>
</div>
@endsection
