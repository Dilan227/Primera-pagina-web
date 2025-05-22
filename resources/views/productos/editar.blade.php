@extends('layout.layout')

@section('titulo', 'Editar Producto')

@section('contenido')
<div class="container">
    <h2>Editar Producto</h2>

    <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected(old('categoria_id', $producto->categoria_id) == $categoria->id)>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="talla_id">Talla</label>
            <select class="form-control" id="talla_id" name="talla_id" required>
                @foreach($tallas as $talla)
                    <option value="{{ $talla->id }}" @selected(old('talla_id', $producto->talla_id) == $talla->id)>{{ $talla->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="marca_id">Marca</label>
            <select class="form-control" id="marca_id" name="marca_id" required>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" @selected(old('marca_id', $producto->marca_id) == $marca->id)>{{ $marca->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_id">Tipo</label>
            <select class="form-control" id="tipo_id" name="tipo_id" required>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" @selected(old('tipo_id', $producto->tipo_id) == $tipo->id)>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
        </div>

        <div class="form-group">
            <label for="existencia">Existencia</label>
            <input type="number" class="form-control" id="existencia" name="existencia" value="{{ old('existencia', $producto->existencia) }}" required>
        </div>

        <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="number" class="form-control" id="descuento" name="descuento" value="{{ old('descuento', $producto->descuento) }}">
        </div>

        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" @selected(old('estado', $producto->estado) == 1)>Activo</option>
                <option value="0" @selected(old('estado', $producto->estado) == 0)>Inactivo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="imagen1">Imagen 1</label>
            <input type="file" class="form-control" id="imagen1" name="imagen1">
            @if($producto->imagen1)
                <img src="{{ asset('storage/' . $producto->imagen1) }}" alt="Imagen 1" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label for="imagen2">Imagen 2</label>
            <input type="file" class="form-control" id="imagen2" name="imagen2">
            @if($producto->imagen2)
                <img src="{{ asset('storage/' . $producto->imagen2) }}" alt="Imagen 2" width="100" class="mt-2">
            @endif
        </div>

        <div class="form-group">
            <label for="imagen3">Imagen 3</label>
            <input type="file" class="form-control" id="imagen3" name="imagen3">
            @if($producto->imagen3)
                <img src="{{ asset('storage/' . $producto->imagen3) }}" alt="Imagen 3" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>
@endsection
