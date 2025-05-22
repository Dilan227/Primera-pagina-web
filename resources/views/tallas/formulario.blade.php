@extends('layout.layout')

@section('titulo', 'Formulario de Talla')

@section('contenido')
<div class="container">
    <h2>Formulario de Talla</h2>
    <form action="{{ route('tallas.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
            @error('nombre')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
