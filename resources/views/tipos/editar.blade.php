@extends('layout.layout')

@section('titulo', 'Editar Tipo')

@section('contenido')
<div class="container">
    <h2>Editar Tipo</h2>
    <form action="{{ route('tipos.actualizar', $tipo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $tipo->nombre) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
