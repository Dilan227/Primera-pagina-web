@extends('layout.layout')

@section('titulo', 'Listado de Categorías')

@section('contenido')
<div class="container">
    <h2>Listado de Categorías</h2>
    <a href="{{ route('categorias.formulario') }}" class="btn btn-success mb-3">Nueva Categoría</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{$item->apellido}}</td>
                <td>{{$item->correo}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->estado}}</td>
                <td>
                    @if($item->imagen)
                        <img src="{{ $item->imagen }}" alt="Imagen" width="100">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <a href="{{ route('categorias.editar', $item->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('categorias.borrar', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?');">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
