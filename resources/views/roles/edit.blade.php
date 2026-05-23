@extends('layouts.app')
@section('title', 'Editar Rol')

@section('content')
<div class="page-header mb-4">
    <h1 class="fw-bold mb-1"><i class="fas fa-edit me-2" style="color:#e74c3c"></i>Editar Rol: {{ $role->name }}</h1>
</div>
<div class="card border-0 shadow-sm"><div class="card-body p-4">
    <form action="{{ route('roles.update', $role->id) }}" method="POST">@csrf @method('PUT')
        <div class="mb-3"><label class="form-label fw-semibold">Nombre del Rol</label>
        <input type="text" name="nombre_rol" class="form-control" value="{{ old('nombre_rol', $role->name) }}"></div>
        <div class="mb-4"><label class="form-label fw-semibold">Descripcion</label>
        <textarea name="descripcion" class="form-control" rows="2">{{ old('descripcion', $role->descripcion) }}</textarea></div>
        <div class="mb-4"><label class="form-label fw-semibold">Permisos</label>
        <div class="row g-2 mt-1">
        @foreach($permisos as $key => $label)
        <div class="col-md-4"><div class="form-check">
        <input class="form-check-input" type="checkbox" name="permisos[]" value="{{ $key }}" id="p_{{ $key }}" {{ in_array($key, $permisosActivos) ? 'checked' : '' }}>
        <label class="form-check-label" for="p_{{ $key }}">{{ $label }}</label>
        </div></div>@endforeach</div></div>
        <div class="d-flex gap-2"><button type="submit" class="btn btn-danger">Actualizar Rol</button>
        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">Cancelar</a></div>
    </form>
</div></div>
@endsection