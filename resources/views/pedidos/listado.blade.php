@extends('layout.layout')

@section('titulo', 'Listado de ' .  'pedidos')

@section('contenido')
<div class="container">
<h2>Listado de pedido</h2>
<a href="{{ route('pedidos.formulario') }}" class="btn btn-success mb-3">Nuevo Pedido</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente ID</th>
            <th>Fecha</th>
            <th>IVA</th>
            <th>Descuento</th>
            <th>Total</th>
            <th>Estado</th>
        </tr>
    </thead>
</table>
</div>
@endsection
