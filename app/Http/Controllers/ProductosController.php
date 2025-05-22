<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Talla;
use App\Models\Marca;
use App\Models\Tipo;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function listado()
    {
        $productos = Producto::all();
        return view('productos.listado', compact('productos'));
    }

    public function formulario()
    {
        return view('productos.formulario', [
            'categorias' => Categoria::all(),
            'tallas' => Talla::all(),
            'marcas' => Marca::all(),
            'tipos' => Tipo::all()
        ]);
    }

    public function guardar(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'talla_id' => 'required|exists:tallas,id',
            'marca_id' => 'required|exists:marcas,id',
            'tipo_id' => 'required|exists:tipos,id',
            'precio' => 'required|numeric',
            'existencia' => 'required|integer',
            'descuento' => 'nullable|numeric',
            'estado' => 'required|boolean',
            'imagen1' => 'nullable|image',
            'imagen2' => 'nullable|image',
            'imagen3' => 'nullable|image',
        ]);

        $producto = Producto::create($validated);

        $this->guardarImagenes($request, $producto);

        return redirect()->route('productos.listado')->with('success', 'Producto creado con éxito.');
    }

    public function editar($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.editar', [
            'producto' => $producto,
            'categorias' => Categoria::all(),
            'tallas' => Talla::all(),
            'marcas' => Marca::all(),
            'tipos' => Tipo::all()
        ]);
    }

    public function actualizar(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'descripcion' => 'required',
            'categoria_id' => 'required|exists:categorias,id',
            'talla_id' => 'required|exists:tallas,id',
            'marca_id' => 'required|exists:marcas,id',
            'tipo_id' => 'required|exists:tipos,id',
            'precio' => 'required|numeric',
            'existencia' => 'required|integer',
            'descuento' => 'nullable|numeric',
            'estado' => 'required|boolean',
            'imagen1' => 'nullable|image',
            'imagen2' => 'nullable|image',
            'imagen3' => 'nullable|image',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($validated);

        $this->guardarImagenes($request, $producto);

        return redirect()->route('productos.listado')->with('success', 'Producto actualizado con éxito.');
    }

    public function borrar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.listado')->with('success', 'Producto eliminado con éxito.');
    }

    private function guardarImagenes(Request $request, Producto $producto)
{
    foreach (['imagen1', 'imagen2', 'imagen3'] as $imagen) {
        if ($request->hasFile($imagen)) {
            $img = $request->file($imagen);
            $nombre = "producto_{$producto->id}_" . substr($imagen, -1) . "." . $img->extension();
            
            // Guardar en la carpeta public/productos
            $ruta = 'productos/' . $nombre;
            $img->move(public_path('productos'), $nombre);
            
            // Guardar la ruta relativa en la base de datos
            $producto->$imagen = $ruta;
            $producto->save();
        }
    }
}
}