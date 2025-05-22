@extends('layout.layout')

@section('titulo', 'Formulario de Producto en Pedido')

@section('contenido')
<div class="container">
    <h2>Formulario de Producto en Pedido</h2>
    <form action="{{ route('productos_pedidos.guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pedido_id" class="form-label">Pedido ID</label>
            <select class="form-control" id="pedido_id" name="pedido_id" required>
                @foreach($pedidos as $pedido)
                    <option value="{{ $pedido->id }}">{{ $pedido->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="producto_id" class="form-label">Producto ID</label>
            <select class="form-control" id="producto_id" name="producto_id" required>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="descuento" class="form-label">Descuento</label>
            <input type="number" class="form-control" id="descuento" name="descuento" step="0.01">
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection