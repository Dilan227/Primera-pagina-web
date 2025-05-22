@extends('layout.layout') <!-- Extiende tu layout principal -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Dashboard</h2>
                </div>
                <div class="card-body">
                    <p>Bienvenido, {{ Auth::guard('admin')->user()->nombre }}!</p> <!-- Muestra el nombre del administrador autenticado -->

                    <!-- Botón de Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection