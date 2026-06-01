@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<div class="container-fluid mb-5">
    <div class="mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <i class="fas fa-user-plus text-warning me-2"></i>Crear Nuevo Usuario
        </h1>
        <p class="text-muted mt-2">Ingresa los datos y asigna un nivel de acceso al sistema.</p>
    </div>

    <div class="card shadow-sm border-0 col-lg-8">
        <div class="card-body p-4">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold text-secondary">Nombre Completo</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ej: Juan David" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold text-secondary">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label fw-bold text-secondary">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required minlength="8">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="role" class="form-label fw-bold text-secondary">Asignar Rol</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-id-badge text-muted"></i></span>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" disabled selected>Seleccione un rol...</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('users.index') }}" class="btn btn-light border fw-semibold text-secondary">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary fw-semibold">
                        <i class="fas fa-save me-2"></i>Guardar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
