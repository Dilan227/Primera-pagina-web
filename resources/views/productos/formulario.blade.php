@extends('layout.layout')

@section('titulo', 'Nuevo Producto')

@section('contenido')
<div class="container">
    <h2>Nuevo Producto</h2>

    <form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoría:</label>
            <select class="form-control @error('categoria_id') is-invalid @enderror" id="categoria_id" name="categoria_id" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="talla_id">Talla:</label>
            <select class="form-control @error('talla_id') is-invalid @enderror" id="talla_id" name="talla_id" required>
                <option value="">Seleccione una talla</option>
                @foreach($tallas as $talla)
                    <option value="{{ $talla->id }}" {{ old('talla_id') == $talla->id ? 'selected' : '' }}>{{ $talla->nombre }}</option>
                @endforeach
            </select>
            @error('talla_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="marca_id">Marca:</label>
            <select class="form-control @error('marca_id') is-invalid @enderror" id="marca_id" name="marca_id" required>
                <option value="">Seleccione una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" {{ old('marca_id') == $marca->id ? 'selected' : '' }}>{{ $marca->nombre }}</option>
                @endforeach
            </select>
            @error('marca_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tipo_id">Tipo de Producto:</label>
            <select class="form-control @error('tipo_id') is-invalid @enderror" id="tipo_id" name="tipo_id" required>
                <option value="">Seleccione un tipo</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}" {{ old('tipo_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            @error('tipo_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" value="{{ old('precio') }}" required>
            @error('precio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="existencia">Existencia:</label>
            <input type="number" class="form-control @error('existencia') is-invalid @enderror" id="existencia" name="existencia" value="{{ old('existencia') }}" required>
            @error('existencia')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descuento">Descuento:</label>
            <input type="number" class="form-control @error('descuento') is-invalid @enderror" id="descuento" name="descuento" value="{{ old('descuento') }}">
            @error('descuento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" required>
                <option value="1" {{ old('estado') == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estado') == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
            @error('estado')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen1">Imagen 1:</label>
            <input type="file" class="form-control @error('imagen1') is-invalid @enderror" id="imagen1" name="imagen1" placeholder="imagen">
            @error('imagen1')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen2">Imagen 2:</label>
            <input type="file" class="form-control @error('imagen2') is-invalid @enderror" id="imagen2" name="imagen2" placeholder="imagen">
            @error('imagen2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="imagen3">Imagen 3:</label>
            <input type="file" class="form-control @error('imagen3') is-invalid @enderror" id="imagen3" name="imagen3" placeholder="imagen">
            @error('imagen3')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
</div>
@endsection

