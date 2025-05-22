<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Producto;

class PedidosController extends Controller
{
    public function listado() {
        $pedidos = Pedido::with('cliente')->get();
        return view('pedidos.listado', ['pedidos' => $pedidos]);
    }

    public function formulario() {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('pedidos.formulario', compact('clientes', 'productos'));
    }

    public function guardar(Request $request) {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'iva' => 'required|numeric|min:0',
            'descuento' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,completado,cancelado'
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.listado')->with('success', 'Pedido creado correctamente');
    }

    public function editar($id) {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('pedidos.editar', compact('pedido', 'clientes', 'productos'));
    }

    public function actualizar(Request $request, $id) {
        $pedido = Pedido::findOrFail($id);

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'fecha' => 'required|date',
            'iva' => 'required|numeric|min:0',
            'descuento' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,completado,cancelado'
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.listado')->with('success', 'Pedido actualizado correctamente');
    }

    public function borrar($id) {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return redirect()->route('pedidos.listado')->with('success', 'Pedido eliminado correctamente');
    }
}