{{-- Nombre --}}
<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Nombre del servicio <span class="text-danger">*</span></label>
    <input type="text" id="name" name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $service->name ?? '') }}"
           placeholder="ej. Manicura básica" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Descripción --}}
<div class="mb-3">
    <label for="description" class="form-label fw-semibold">Descripción</label>
    <textarea id="description" name="description" rows="3"
              class="form-control @error('description') is-invalid @enderror"
              placeholder="Descripción opcional del servicio">{{ old('description', $service->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Duración --}}
<div class="mb-3">
    <label for="duration_minutes" class="form-label fw-semibold">Duración (minutos) <span class="text-danger">*</span></label>
    <input type="number" id="duration_minutes" name="duration_minutes"
           class="form-control @error('duration_minutes') is-invalid @enderror"
           value="{{ old('duration_minutes', $service->duration_minutes ?? '') }}"
           min="5" max="480" placeholder="ej. 60" required>
    @error('duration_minutes')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Precio --}}
<div class="mb-3">
    <label for="price" class="form-label fw-semibold">Precio ($) <span class="text-danger">*</span></label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" id="price" name="price" step="0.01"
               class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price', $service->price ?? '') }}"
               min="0" placeholder="0.00" required>
    </div>
    @error('price')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

{{-- Estado activo --}}
<div class="form-check form-switch mb-1">
    <input class="form-check-input" type="checkbox" id="active" name="active"
           {{ old('active', $service->active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Servicio activo</label>
</div>