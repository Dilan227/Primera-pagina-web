@extends('layout.layout')

@section('titulo', 'Formulario de Pedido')

@section('contenido')
<div class="container">
    <h2>Formulario de Pedido</h2>
    <form action="/pedidos/guardar" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="text" class="form-control" id="id" name="id" readonly>
            <span class="error-message text-danger" style="font-size: 0.9em;"></span>
        </div>
        <div class="mb-3">
            <label for="id_cliente" class="form-label">ID Cliente</label>
            <input type="text" class="form-control" id="id_cliente" name="id_cliente" required>
            <span class="error-message text-danger" style="font-size: 0.9em;"></span>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
            <span class="error-message text-danger" style="font-size: 0.9em;"></span>
        </div>
        <div class="mb-3">
            <label for="iva" class="form-label">IVA (%)</label>
            <input type="number" class="form-control" id="iva" name="iva" step="0.01" required>
            <span class="error-message text-danger" style="font-size: 0.9em;"></span>
        </div>
        <div class="mb-3">
            <label for="descuento" class="form-label">Descuento (%)</label>
            <input type="number" class="form-control" id="descuento" name="descuento" step="0.01" required>
            <span class="error-message text-danger" style="font-size: 0.9em;"></span>
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" step="0.01" required>
            <span class="error-message text-danger" style="font-size: 0.9em;"></span>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
