@extends('layout.layout')

@section('titulo', 'Formulario de Marca')

@section('contenido')
<div class="container">
    <h2>Nueva Marca</h2>
    <form action="{{ route('marcas.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>
        <div class="mb-3">
            <label for="logo" class="form-label">Logo (URL)</label>
            <input type="url" class="form-control" id="logo" name="logo" value="{{ old('logo') }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
