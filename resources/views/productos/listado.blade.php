@extends('layout.layout')

@section('titulo', 'Listado de Productos')

@section('contenido')
<div class="container">
    <h2>Listado de Productos</h2>
    <a href="{{ route('productos.formulario') }}" class="btn btn-success mb-3">Nuevo Producto</a>

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
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Talla</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Descuento</th>
                <th>Estado</th>
                <th>Imagen 1</th>
                <th>Imagen 2</th>
                <th>Imagen 3</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->talla->nombre }}</td>
                <td>{{ $producto->marca->nombre }}</td>
                <td>{{ $producto->tipo->nombre }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->existencia }}</td>
                <td>{{ $producto->descuento }}</td>
                <td>{{ $producto->estado ? 'Activo' : 'Inactivo' }}</td>
                <td><img src=" {{ $producto->imagen1 }}"  width="100"></td>
                <td><img src=" {{  $producto->imagen2 }}"  width="100"></td>
                <td><img src=" {{  $producto->imagen3 }}"  width="100"></td>
                <td>
                    <a href="{{ route('productos.editar', $producto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <form action="{{ route('productos.borrar', $producto->id) }}" method="POST" style="display:inline;">
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