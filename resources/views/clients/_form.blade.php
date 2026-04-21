{{-- Nombre --}}
<div class="mb-3">
    <label for="name" class="form-label fw-semibold">Nombre completo <span class="text-danger">*</span></label>
    <input type="text" id="name" name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $client->name ?? '') }}"
           placeholder="ej. María García" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Teléfono --}}
<div class="mb-3">
    <label for="phone" class="form-label fw-semibold">Teléfono</label>
    <input type="text" id="phone" name="phone"
           class="form-control @error('phone') is-invalid @enderror"
           value="{{ old('phone', $client->phone ?? '') }}"
           placeholder="ej. 3001234567">
    @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Email --}}
<div class="mb-3">
    <label for="email" class="form-label fw-semibold">Correo electrónico</label>
    <input type="email" id="email" name="email"
           class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $client->email ?? '') }}"
           placeholder="ej. maria@gmail.com">
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Notas --}}
<div class="mb-3">
    <label for="notes" class="form-label fw-semibold">Notas</label>
    <textarea id="notes" name="notes" rows="3"
              class="form-control @error('notes') is-invalid @enderror"
              placeholder="Información adicional del cliente">{{ old('notes', $client->notes ?? '') }}</textarea>
    @error('notes')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>