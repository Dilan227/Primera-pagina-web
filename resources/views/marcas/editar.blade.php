@extends('layout.layout')

@section('titulo', 'Editar Marca')

@section('contenido')
<div class="container">
    <h2>Editar Marca</h2>
    <form action="{{ route('marcas.actualizar', $marca->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $marca->nombre) }}" required>
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo (URL)</label>
            <input type="url" class="form-control" id="logo" name="logo" value="{{ old('logo', $marca->logo) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
