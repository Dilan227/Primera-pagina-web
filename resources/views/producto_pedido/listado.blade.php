@extends('layout.layout')

@section('titulo', 'Listado de Productos en Pedidos')

@section('contenido')
<div class="container">
    <h2>Listado de Productos en Pedidos</h2>
    <a href="{{ route('productos_pedidos.formulario') }}" class="btn btn-success mb-3">Nuevo Producto en Pedido</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pedido ID</th>
                <th>Producto ID</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Descuento</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productosPedidos as $productoPedido)
            <tr>
                <td>{{ $productoPedido->id }}</td>
                <td>{{ $productoPedido->pedido_id }}</td>
                <td>{{ $productoPedido->producto_id }}</td>
                <td>{{ $productoPedido->cantidad }}</td>
                <td>{{ $productoPedido->precio }}</td>
                <td>{{ $productoPedido->descuento }}</td>
                <td>{{ $productoPedido->total }}</td>
                <td>
                    <a href="{{ route('productos_pedidos.editar', $productoPedido->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('productos_pedidos.borrar', $productoPedido->id) }}" method="POST" style="display:inline;">
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