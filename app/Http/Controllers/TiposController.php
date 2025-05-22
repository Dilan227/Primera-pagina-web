<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TiposController extends Controller
{
    public function listado() {
        $tipos = Tipo::all();
        return view('tipos.listado', ['tipos' => $tipos]);
    }

    public function formulario() {
        return view('tipos.formulario');
    }

    public function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos,nombre'
        ]);

        Tipo::create($request->all());

        return redirect()->route('tipos.listado')->with('success', 'Tipo creado correctamente');
    }

    public function editar($id) {
        $tipo = Tipo::findOrFail($id);
        return view('tipos.editar',['tipo' => $tipo]);
    }

    public function actualizar(Request $request, $id) {
        $tipo = Tipo::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:tipos,nombre,' . $tipo->id
        ]);

        $tipo->update($request->all());

        return redirect()->route('tipos.listado')->with('success', 'Tipo actualizado correctamente');
    }

    public function borrar($id) {
        $tipo = Tipo::findOrFail($id);
        $tipo->delete();
        return redirect()->route('tipos.listado')->with('success', 'Tipo eliminado correctamente');
    }
}
