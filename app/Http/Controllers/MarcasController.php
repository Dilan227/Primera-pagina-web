<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    public function listado() {
        $marcas = Marca::all();
        return view('marcas.listado', ['marcas' => $marcas]);
    }

    public function formulario() {
        return view('marcas.formulario');
    }

    public function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:marcas,nombre',
            'logo' => 'nullable|url'
        ]);

        Marca::create($request->all());

        return redirect()->route('marcas.listado')->with('success', 'Marca creada correctamente');
    }

    public function editar($id) {
        $marca = Marca::findOrFail($id);
        return view('marcas.editar', ['marca' => $marca]);
    }

    public function actualizar(Request $request, $id) {
        $marca = Marca::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:marcas,nombre,' . $marca->id,
            'logo' => 'nullable|url'
        ]);

        $marca->update($request->all());

        return redirect()->route('marcas.listado')->with('success', 'Marca actualizada correctamente');
    }

    public function borrar($id) {
        $marca = Marca::findOrFail($id);
        $marca->delete();
        return redirect()->route('marcas.listado')->with('success', 'Marca eliminada correctamente');
    }
}
