@extends('layouts.app')
@section('title', 'Gestion de Roles')

@section('content')
<div class="page-header mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h1 class="fw-bold mb-1"><i class="fas fa-shield-alt me-2" style="color:#e74c3c"></i>Roles del Sistema</h1>
        <p class="text-muted">Administra los roles y sus permisos</p>
    </div>
    <a href="{{ route('roles.create') }}" class="btn btn-danger"><i class="fas fa-plus me-2"></i>Nuevo Rol</a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <table class="table mb-0">
            <thead><tr><th>#</th><th>Nombre</th><th>Descripcion</th><th>Permisos</th><th>Acciones</th></tr></thead>
            <tbody>
                @forelse($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td><strong>{{ $role->name }}</strong></td>
                    <td>{{ $role->descripcion ?? '-' }}</td>
                    <td>@php $permisos = json_decode($role->permisos ?? '[]', true) @endphp
                        @if(count($permisos) > 0)<span class="badge bg-success">{{ count($permisos) }} permisos</span>
                        @else<span class="badge bg-secondary">Sin permisos</span>@endif
                    </td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminar?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">No hay roles.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection