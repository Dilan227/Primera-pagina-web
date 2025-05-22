<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TallasController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\HomeController;
use App\Models\Administrador;

// Ruta de inicio
Route::get('/', [HomeController::class, 'index'])->name('inicio');


Route::get('/', function () {
    return view('inicio');
})->name('inicio');

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/administradores/registro', [AdministradoresController::class, 'mostrarFormularioRegistro'])->name('administradores.registro');
    Route::post('/administradores/registro', [AdministradoresController::class, 'registrar'])->name('administradores.registrar');
});

// Ruta para mostrar el formulario de login
Route::get('/administradores/login', [AdministradoresController::class, 'login'])->name('administradores.login');

// Ruta para procesar el login
Route::post('/administradores/login', [AdministradoresController::class, 'in'])->name('administradores.login.submit');

// Ruta para cerrar sesión
Route::post('/administradores/logout', [AdministradoresController::class, 'logout'])->name('administradores.logout');

// Ruta del panel de administración (protegida)
Route::get('/panel', function () {
    return view('administradores.panel');
})->name('panel')->middleware('auth:admin');

// Ruta para mostrar el formulario de creación de un nuevo administrador
Route::get('/administradores/formulario', [AdministradoresController::class, 'formulario'])->name('administradores.formulario')->middleware('auth:admin');

// Ruta para guardar un nuevo administrador
Route::post('/administradores/guardar', [AdministradoresController::class, 'guardar'])->name('administradores.guardar')->middleware('auth:admin');

    // Administradores
    Route::prefix('administradores')->group(function () {
        Route::get('/listado', [AdministradoresController::class, 'listado'])->name('administradores.listado');
        Route::get('/formulario', [AdministradoresController::class, 'formulario'])->name('administradores.formulario');
        Route::post('/guardar', [AdministradoresController::class, 'guardar'])->name('administradores.guardar');
        Route::get('/{id}/editar', [AdministradoresController::class, 'editar'])->name('administradores.editar');
        Route::put('/{id}', [AdministradoresController::class, 'actualizar'])->name('administradores.actualizar');
        Route::delete('/{id}', [AdministradoresController::class, 'borrar'])->name('administradores.borrar');
    });

    // Otras rutas protegidas (clientes, productos, categorías, etc.)
    //Categorías
Route::get('/categorias/listado', [CategoriasController::class, 'listado'])->name('categorias.listado');
Route::get('/categorias/formulario', [CategoriasController::class, 'formulario'])->name('categorias.formulario');
Route::post('/categorias', [CategoriasController::class, 'guardar'])->name('categorias.guardar');
Route::get('/categorias/editar/{id}', [CategoriasController::class, 'editar'])->name('categorias.editar');
Route::put('/categorias/{id}', [CategoriasController::class, 'actualizar'])->name('categorias.actualizar');
Route::delete('/categorias/{id}', [CategoriasController::class, 'borrar'])->name('categorias.borrar');



// Clientes
Route::get('/clientes/listado', [ClientesController::class, 'listado'])->name('clientes.listado');
Route::get('/clientes/formulario', [ClientesController::class, 'formulario'])->name('clientes.formulario');
Route::post('/clientes', [ClientesController::class, 'guardar'])->name('clientes.guardar');
Route::get('/clientes/editar/{id}', [ClientesController::class, 'editar'])->name('clientes.editar');
Route::put('/clientes/{id}', [ClientesController::class, 'actualizar'])->name('clientes.actualizar');
Route::delete('/clientes/{id}', [ClientesController::class, 'borrar'])->name('clientes.borrar');

//Productos
Route::get('/productos/listado', [ProductosController::class, 'listado'])->name('productos.listado');
Route::get('/productos/formulario', [ProductosController::class, 'formulario'])->name('productos.formulario');
Route::post('/productos', [ProductosController::class, 'guardar'])->name('productos.guardar');
Route::get('/productos/editar/{id}', [ProductosController::class, 'editar'])->name('productos.editar');
Route::put('/productos/{id}', [ProductosController::class, 'actualizar'])->name('productos.actualizar');
Route::delete('/productos/{id}', [ProductosController::class, 'borrar'])->name('productos.borrar');



// Marcas 
Route::get('/marcas/listado', [MarcasController::class, 'listado'])->name('marcas.listado');
Route::get('/marcas/formulario', [MarcasController::class, 'formulario'])->name('marcas.formulario');
Route::post('/marcas', [MarcasController::class, 'guardar'])->name('marcas.guardar');
Route::get('/marcas/editar/{id}', [MarcasController::class, 'editar'])->name('marcas.editar');
Route::put('/marcas/{id}', [MarcasController::class, 'actualizar'])->name('marcas.actualizar');
Route::delete('/marcas/{id}', [MarcasController::class, 'borrar'])->name('marcas.borrar');


//Tallas
Route::get('tallas', [TallasController::class, 'listado'])->name('tallas.listado');
Route::get('tallas/crear', [TallasController::class, 'formulario'])->name('tallas.formulario');
Route::post('tallas', [TallasController::class, 'guardar'])->name('tallas.guardar');
Route::get('tallas/{id}/editar', [TallasController::class, 'editar'])->name('tallas.editar');
Route::put('tallas/{id}', [TallasController::class, 'actualizar'])->name('tallas.actualizar');
Route::delete('tallas/{id}', [TallasController::class, 'borrar'])->name('tallas.borrar');

//Tipos
Route::get('tipos', [TiposController::class, 'listado'])->name('tipos.listado');
Route::get('tipos/crear', [TiposController::class, 'formulario'])->name('tipos.formulario');
Route::post('tipos', [TiposController::class, 'guardar'])->name('tipos.guardar');
Route::get('tipos/{id}/editar', [TiposController::class, 'editar'])->name('tipos.editar');
Route::put('tipos/{id}', [TiposController::class, 'actualizar'])->name('tipos.actualizar');
Route::delete('tipos/{id}', [TiposController::class, 'borrar'])->name('tipos.borrar');


// Ruta demo (opcional, eliminar en producción)
Route::get('/crear-usuario-base', function () {
    // Verificar si el usuario ya existe
    $usuarioExistente = Administrador::where('usuario', 'admin')->first();
    if ($usuarioExistente) {
        return "El usuario base ya existe.";
    }

    // Crear el usuario base
    $admin = new Administrador();
    $admin->nombre = 'Admin';
    $admin->apellido = 'Base';
    $admin->correo = 'admin@example.com';
    $admin->usuario = 'admin';
    $admin->contraseña = Hash::make('admin123'); // Hashear la contraseña
    $admin->imagen = 'Tienda_ropa/public/storage/administradores/admin_default.jpg'; // Imagen por defecto
    $admin->rol = 'admin';
    $admin->estado = 'activo';
    $admin->save();

    return "Usuario base creado exitosamente.";
});

Route::get('/crear-usuario-base2', function () {
    // Verificar si el usuario ya existe
    $usuarioExistente = Administrador::where('usuario', 'admin')->first();
    if ($usuarioExistente) {
        return "El usuario base ya existe.";
    }

    // Crear el usuario base
    $admin = new Administrador();
    $admin->nombre = 'Admin2';
    $admin->apellido = 'Base2';
    $admin->correo = 'admin@example.com';
    $admin->usuario = 'admin2';
    $admin->contraseña = Hash::make('admin1234'); // Hashear la contraseña
    $admin->imagen = 'Tienda_ropa/public/storage/administradores/admin_default.jpg'; // Imagen por defecto
    $admin->rol = 'admin';
    $admin->estado = 'activo';
    $admin->save();

    return "Usuario base creado exitosamente.";
});