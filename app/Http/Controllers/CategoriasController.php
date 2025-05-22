<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    public function listado() {
        $categorias = Categoria::all();
        return view('categorias.listado', ['categorias' => $categorias]);
    }

    public function formulario() {
        return view('categorias.formulario');
    }

    public function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
            'imagen' => 'nullable|url',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
            'imagen.url' => 'La URL de la imagen debe ser válida.',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.listado')->with('success', 'Categoría creada correctamente');
    }

    public function editar($id) {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.editar', ['categoria' => $categoria]);
    }

    public function actualizar(Request $request, $id) {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255|unique:categorias,nombre,' . $categoria->id,
            'imagen' => 'nullable|url',
        ], [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
            'imagen.url' => 'La URL de la imagen debe ser válida.',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.listado')->with('success', 'Categoría actualizada correctamente');
    }

    public function borrar($id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.listado')->with('success', 'Categoría eliminada correctamente');
    }
}
