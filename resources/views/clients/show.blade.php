<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de {{ $client->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">📋 Historial de {{ $client->name }}</h1>
        <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary">← Volver</a>
    </div>

    {{-- Información del cliente --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-dark text-white">
            <strong>Información del cliente</strong>
        </div>
        <div class="card-body">
            <p class="mb-1"><strong>📞 Teléfono:</strong> {{ $client->phone ?? '—' }}</p>
            <p class="mb-1"><strong>📧 Email:</strong> {{ $client->email ?? '—' }}</p>
            <p class="mb-0"><strong>📝 Notas:</strong> {{ $client->notes ?? '—' }}</p>
        </div>
    </div>

    {{-- Historial de citas --}}
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <strong>📅 Historial de Citas</strong>
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-secondary">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Servicio</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->date ?? '—' }}</td>
                            <td>{{ $appointment->service->name ?? '—' }}</td>
                            <td>{{ $appointment->status ?? '—' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Este cliente no tiene citas registradas aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>