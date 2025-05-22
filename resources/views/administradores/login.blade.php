<!-- resources/views/administradores/login.blade.php -->
@extends('layout.layout')

@section('titulo', 'Iniciar Sesión')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Login de Administradores</h2>
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

                        <!-- Formulario de Login -->
                        <!-- resources/views/administradores/login.blade.php -->
<form method="POST" action="{{ route('administradores.login.submit') }}">
    @csrf
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" value="{{ old('usuario') }}" required autofocus>
    </div>
    <div class="mb-3">
        <label for="contraseña" class="form-label">Contraseña</label>
        <input type="password" name="contraseña" class="form-control" required> <!-- Asegúrate de que coincida con la base de datos -->
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
