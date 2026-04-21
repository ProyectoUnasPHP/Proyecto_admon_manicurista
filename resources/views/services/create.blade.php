@extends('layouts.app')

@section('title', 'Nuevo Servicio')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
    <h1 class="h3 mb-4">➕ Nuevo Servicio</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                @include('services._form')
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection