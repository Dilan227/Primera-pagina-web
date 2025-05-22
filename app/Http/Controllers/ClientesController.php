<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Services\OpenMeteoService;

class ClientesController extends Controller
{

    public function listado() {
        $clientes = Cliente::all();
        return view('clientes.listado', ['clientes' => $clientes]);
    }

    public function formulario() {
        return view('clientes.formulario');
    }

    public function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'direccion' => 'required|string|max:255',
            'imagen' => 'nullable|url',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.listado')->with('success', 'Cliente creado correctamente');
    }

    public function editar($id) {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.editar', ['cliente' => $cliente]);
    }

    public function actualizar(Request $request, $id) {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo,' . $cliente->id,
            'direccion' => 'required|string|max:255',
            'imagen' => 'nullable|url',
            'latitud' => 'nullable|numeric',
            'longitud' => 'nullable|numeric',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.listado')->with('success', 'Cliente actualizado correctamente');
    }

    public function borrar($id) {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.listado')->with('success', 'Cliente eliminado correctamente');
    }
}