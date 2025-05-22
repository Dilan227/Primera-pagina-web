@extends('layout.layout')

@section('titulo', 'Listado de Tallas')

@section('contenido')
<div class="container">
    <h2>Listado de Tallas</h2>
    <a href="{{ route('tallas.formulario') }}" class="btn btn-success mb-3">Nueva Talla</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tallas as $talla)
            <tr>
                <td>{{ $talla->id }}</td>
                <td>{{ $talla->nombre }}</td>
                <td>
                    <a href="{{ route('tallas.editar', $talla->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('tallas.borrar', $talla->id) }}" method="POST" style="display:inline;">
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
