@extends('layout.layout')

@section('titulo', 'Listado de Marcas')

@section('contenido')
<div class="container">
    <h2>Listado de Marcas</h2>
    <a href="{{ route('marcas.formulario') }}" class="btn btn-success mb-3">Nueva Marca</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Logo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <td>{{ $marca->id }}</td>
                <td>{{ $marca->nombre }}</td>
                <td>
                    @if($marca->logo)
                        <img src="{{ $marca->logo }}" alt="Logo" width="50">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('marcas.editar', $marca->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('marcas.borrar', $marca->id) }}" method="POST" style="display:inline;">
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
