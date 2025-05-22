@extends('layout.layout')

@section('titulo', 'Listado de Clientes')

@section('contenido')
<div class="container">
    <h2>Listado de Clientes</h2>

    <!-- Mostrar mensaje de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('clientes.formulario') }}" class="btn btn-success mb-3">Nuevo Cliente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Imagen</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td><img src="{{ $cliente->imagen }}" style="width: 50px;"></td>
                    <td>{{ $cliente->estado }}</td>
                    <td>
                        <a href="{{ route('clientes.editar', $cliente->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('clientes.borrar', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection