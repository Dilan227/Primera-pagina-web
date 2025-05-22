<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoPedido;
use App\Models\Pedido;
use App\Models\Producto;

class ProductosPedidosController extends Controller
{
    public function listado() {
        $productosPedidos = ProductoPedido::with(['pedido', 'producto'])->get();
        return view('productos_pedidos.listado', compact('productosPedidos'));
    }

    public function formulario() {
        $pedidos = Pedido::all();
        $productos = Producto::all();
        return view('productos_pedidos.formulario', compact('pedidos', 'productos'));
    }

    public function guardar(Request $request) {
        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
            'total' => 'required|numeric|min:0'
        ]);

        ProductoPedido::create($request->all());

        return redirect()->route('productos_pedidos.listado')->with('success', 'Producto en pedido creado correctamente');
    }

    public function editar($id) {
        $productoPedido = ProductoPedido::findOrFail($id);
        $pedidos = Pedido::all();
        $productos = Producto::all();
        return view('productos_pedidos.editar', compact('productoPedido', 'pedidos', 'productos'));
    }

    public function actualizar(Request $request, $id) {
        $productoPedido = ProductoPedido::findOrFail($id);

        $request->validate([
            'pedido_id' => 'required|exists:pedidos,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'descuento' => 'nullable|numeric|min:0',
            'total' => 'required|numeric|min:0'
        ]);

        $productoPedido->update($request->all());

        return redirect()->route('productos_pedidos.listado')->with('success', 'Producto en pedido actualizado correctamente');
    }

    public function borrar($id) {
        $productoPedido = ProductoPedido::findOrFail($id);
        $productoPedido->delete();
        return redirect()->route('productos_pedidos.listado')->with('success', 'Producto en pedido eliminado correctamente');
    }
}
