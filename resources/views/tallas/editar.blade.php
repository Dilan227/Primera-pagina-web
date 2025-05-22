@extends('layout.layout')

@section('titulo', 'Editar Talla')

@section('contenido')
<div class="container">
    <h2>Editar Talla</h2>
    <form action="{{ route('tallas.actualizar', $talla->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $talla->nombre }}" required>
            @error('nombre')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
