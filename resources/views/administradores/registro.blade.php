<!-- resources/views/administradores/registro.blade.php -->
@extends('layout.layout')

@section('titulo', 'Registro de Administrador')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Registro de Administrador</h2>
                    </div>
                    <div class="card-body">
                        <!-- Mostrar mensajes de éxito -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Mostrar mensajes de error -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulario de Registro -->
                        <!-- resources/views/administradores/registro.blade.php -->
                        <form method="POST" action="{{ route('administradores.registrar') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" class="form-control" value="{{ old('apellido') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" name="correo" class="form-control" value="{{ old('correo') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuario</label>
                                <input type="text" name="usuario" class="form-control" value="{{ old('usuario') }}"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" name="contraseña" class="form-control" required>
                                <!-- Asegúrate de que coincida con la base de datos -->
                            </div>
                            <div class="mb-3">
                                <label for="contraseña_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" name="contraseña_confirmation" class="form-control" required>
                                <!-- Confirmación -->
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
