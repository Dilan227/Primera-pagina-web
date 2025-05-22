@extends('layout.layout')

@section('titulo', 'Nueva Categoría')

@section('contenido')
<div class="container">
    <h2>Nueva Categoría</h2>
    
    <form action="{{ route('categorias.guardar') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="imagen">Imagen (URL):</label>
            <input type="url" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" value="{{ old('imagen') }}">
            @error('imagen')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Crear</button>
    </form>
</div>
@endsection

