@extends('layout.layout')

@section('titulo', 'Editar Cliente')

@section('contenido')
<div class="container">
    <h2>Editar Cliente</h2>
    <form action="{{ route('clientes.actualizar', $cliente->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $cliente->nombre) }}" required>
            @if ($errors->has('nombres'))
                <span class="text-danger">{{ $errors->first('nombres') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $cliente->apellido) }}" required>
            @if ($errors->has('apellidos'))
                <span class="text-danger">{{ $errors->first('apellidos') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo', $cliente->correo) }}" required>
            @if ($errors->has('correo'))
                <span class="text-danger">{{ $errors->first('correo') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
            @if ($errors->has('direccion'))
                <span class="text-danger">{{ $errors->first('direccion') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" placeholder="imagen">
            @if ($errors->has('imagen'))
                <span class="text-danger">{{ $errors->first('imagen') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="activo" {{ old('estado', $cliente->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ old('estado', $cliente->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            @if ($errors->has('estado'))
                <span class="text-danger">{{ $errors->first('estado') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
