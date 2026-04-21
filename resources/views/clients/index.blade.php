<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">👥 Gestión de Clientes</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">+ Nuevo Cliente</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Buscador --}}
    <form method="GET" action="{{ route('clients.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control"
                   placeholder="Buscar por nombre, email o teléfono..."
                   value="{{ $search ?? '' }}">
            <button type="submit" class="btn btn-outline-secondary">🔍 Buscar</button>
            @if($search)
                <a href="{{ route('clients.index') }}" class="btn btn-outline-danger">✕ Limpiar</a>
            @endif
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Notas</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->phone ?? '—' }}</td>
                            <td>{{ $client->email ?? '—' }}</td>
                            <td class="text-muted small">{{ Str::limit($client->notes, 40) ?? '—' }}</td>
                            <td class="text-center">
                                <a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-outline-info">Historial</a>
                                <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('¿Eliminar este cliente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No hay clientes registrados aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">{{ $clients->links() }}</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>