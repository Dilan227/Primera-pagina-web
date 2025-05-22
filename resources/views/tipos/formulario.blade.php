@extends('layout.layout')

@section('titulo', 'Formulario de Tipo')

@section('contenido')
<div class="container">
    <h2>Formulario de Tipo</h2>
    <form action="{{ route('tipos.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
