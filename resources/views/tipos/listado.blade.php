@extends('layout.layout')

@section('titulo', 'Listado de Tipos')

@section('contenido')
<div class="container">
    <h2>Listado de Tipos</h2>
    <a href="{{ route('tipos.formulario') }}" class="btn btn-success mb-3">Nuevo Tipo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipos as $tipo)
            <tr>
                <td>{{ $tipo->id }}</td>
                <td>{{ $tipo->nombre }}</td>
                <td>
                    <a href="{{ route('tipos.editar', $tipo->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('tipos.borrar', $tipo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?');">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
