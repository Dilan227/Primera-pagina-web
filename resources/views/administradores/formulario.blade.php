<!-- resources/views/administradores/formulario.blade.php -->
@extends('layout.layout')

@section('titulo', 'Agregar Administrador')

@section('contenido')
<div class="container">
    <h2>Agregar Nuevo Administrador</h2>
    <form method="POST" action="{{ route('administradores.guardar') }}" enctype="multipart/form-data">
        @csrf <!-- Token de seguridad -->

        <!-- Campo de Nombre -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <!-- Campo de Apellido -->
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>

        <!-- Campo de Correo -->
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>

        <!-- Campo de Usuario -->
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>

        <!-- Campo de Contraseña -->
        <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" name="contrasena" class="form-control" required>
        </div>

        <!-- Campo de Imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control">
        </div>

        <!-- Campo de Rol -->
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="usuario">Usuario</option>
            </select>
        </div>

        <!-- Campo de Estado -->
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsectionr