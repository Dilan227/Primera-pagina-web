<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talla;

class TallasController extends Controller
{
    public function listado() {
        $tallas = Talla::all();
        return view('tallas.listado', ['tallas' => $tallas]);
    }

    public function formulario() {
        return view('tallas.formulario');
    }

    public function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:tallas,nombre'
        ]);

        Talla::create($request->all());

        return redirect()->route('tallas.listado')->with('success', 'Talla creada correctamente');
    }

    public function editar($id) {
        $talla = Talla::findOrFail($id);
        return view('tallas.editar', ['talla' => $talla]);
    }

    public function actualizar(Request $request, $id) {
        $talla = Talla::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:50|unique:tallas,nombre,' . $talla->id  
        ]);

        $talla->update($request->all());

        return redirect()->route('tallas.listado')->with('success', 'Talla actualizada correctamente');
    }

    public function borrar($id) {
        $talla = Talla::findOrFail($id);
        $talla->delete();
        return redirect()->route('tallas.listado')->with('success', 'Talla eliminada correctamente');
    }
}
