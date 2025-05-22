@extends('layout.layout') <!-- Extiende tu layout principal -->

@section('content')
<div class="container">
    <h2>Editar Administrador</h2>
    <form method="POST" action="{{ route('administradores.actualizar', $administrador->id) }}" enctype="multipart/form-data">
        @csrf <!-- Token de seguridad -->
        @method('PUT') <!-- Método HTTP para actualizar -->

        <!-- Campo de Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $administrador->nombre }}" required>
        </div>

        <!-- Campo de Correo -->
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ $administrador->correo }}" required>
        </div>

        <!-- Campo de Contraseña -->
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña (dejar en blanco para no cambiar)</label>
            <input type="password" name="contrasena" class="form-control">
        </div>

        <!-- Campo de Rol -->
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" class="form-control" required>
                <option value="admin" {{ $administrador->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="usuario" {{ $administrador->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
            </select>
        </div>

        <!-- Campo de Imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control">
            @if ($administrador->imagen)
                <img src="{{ $administrador->imagen }}" alt="Imagen del administrador" width="100">
            @endif
        </div>

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection