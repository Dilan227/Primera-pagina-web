<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdministradoresController extends Controller
{
    // Método para mostrar el formulario de login
    public function login()
    {
        return view('administradores.login');
    }

    // Método para procesar el login
    public function in(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'usuario' => 'required|string',
            'contraseña' => 'required|string', // Asegúrate de que coincida con la base de datos
        ]);
    
        // Buscar al administrador en la base de datos
        $administrador = Administrador::where('usuario', $request->usuario)
                              ->where('estado', 'activo')
                              ->first();
    
        // Verificar si el administrador existe y si la contraseña es correcta
        if ($administrador && Hash::check($request->contraseña, $administrador->contraseña)) {
            // Autenticar al administrador usando el guard "admin"
            Auth::guard('admin')->login($administrador);
    
            // Redirigir al panel de administración
            return redirect()->route('administradores.listado')->with('success', '¡Bienvenido, ' . $administrador->nombre . '!');
        }
    
        // Si la autenticación falla, regresar con un mensaje de error
        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('usuario');
    }

    // Método para cerrar sesión
    public function logout(Request $request)
{
    // Cerrar sesión del administrador usando el guard "admin"
    Auth::guard('admin')->logout();

    // Invalidar la sesión
    $request->session()->invalidate();

    // Regenerar el token de sesión
    $request->session()->regenerateToken();

    // Redirigir al formulario de login
    return redirect()->route('inicio');
}

    // Método para mostrar el listado de administradores
    public function listado()
    {
        $administradores = Administrador::all();
        return view('administradores.listado', ['administradores' => $administradores]);
    }

    // Método para mostrar el formulario de creación de administradores
    public function formulario()
    {
        return view('administradores.formulario');
    }

    // Método para guardar un nuevo administrador
    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:administradores,correo',
            'usuario' => 'required|string|unique:administradores,usuario',
            'contraseña' => 'required|string|min:8', // Asegúrate de que coincida con el nombre en la base de datos
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rol' => 'required|string',
            'estado' => 'required|string',
        ]);
    
        // Crear un nuevo administrador
        $administrador = new Administrador();
        $administrador->nombre = $request->nombre;
        $administrador->apellido = $request->apellido;
        $administrador->correo = $request->correo;
        $administrador->usuario = $request->usuario;
        $administrador->contraseña = Hash::make($request->contraseña); // Hashear la contraseña
        $administrador->rol = $request->rol;
        $administrador->estado = $request->estado;
    
        // Guardar la imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = 'admin_' . time() . '.' . $imagen->extension();
            $rutaImagen = $imagen->storeAs('administradores', $nombreImagen, 'public');
            $administrador->imagen = asset('storage/' . $rutaImagen);
        }
    
        // Guardar el administrador en la base de datos
        $administrador->save();
    
        // Redirigir al listado de administradores con un mensaje de éxito
        return redirect()->route('administradores.listado')->with('success', 'Administrador creado exitosamente.');
    }

    // Método para mostrar el formulario de edición de administradores
    public function editar($id)
    {
        $administrador = Administrador::findOrFail($id);
        return view('administradores.editar', ['administrador' => $administrador]);
    }

    // Método para actualizar un administrador existente
    public function actualizar(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => ['required', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/', 'min:2', 'max:50'],
            'apellido' => ['required', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ ]+$/', 'min:2', 'max:50'],
            'correo' => ['required', 'email', 'max:100', Rule::unique('administradores')->ignore($id)],
            'usuario' => ['required', 'alpha_num', 'min:4', 'max:30', Rule::unique('administradores')->ignore($id)],
            'contraseña' => ['nullable', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/'], // Asegúrate de que coincida con el nombre en la base de datos
            'imagen' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'rol' => ['required', Rule::in(['admin', 'usuario'])],
            'estado' => ['required', Rule::in(['activo', 'inactivo'])]
        ]);

        // Buscar al administrador en la base de datos
        $administrador = Administrador::findOrFail($id);

        // Actualizar los datos del administrador
        $administrador->nombre = $request->nombre;
        $administrador->apellido = $request->apellido;
        $administrador->correo = $request->correo;
        $administrador->usuario = $request->usuario;
        if ($request->filled('contraseña')) {
            $administrador->contraseña = Hash::make($request->contraseña); // Hashear la contraseña si se proporciona
        }
        $administrador->rol = $request->rol;
        $administrador->estado = $request->estado;

        // Actualizar la imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $img = $request->file('imagen');
            $nombre = "administrador_" . $administrador->id . "." . $img->extension();
            $ruta = $img->storeAs('administradores', $nombre, 'public');
            $administrador->imagen = asset("storage/" . $ruta);
        }

        $administrador->save();

        // Redirigir al listado de administradores
        return redirect()->route('administradores.listado')->with('success', 'Administrador actualizado exitosamente.');
    }

    // Método para eliminar un administrador
    public function borrar($id)
    {
        $administrador = Administrador::findOrFail($id);
        $administrador->delete();

        // Redirigir al listado de administradores
        return redirect()->route('administradores.listado')->with('success', 'Administrador eliminado exitosamente.');
    }

    // Método para mostrar el formulario de registro
    public function mostrarFormularioRegistro()
    {
        return view('administradores.registro');
    }

    // Método para procesar el formulario de registro
    public function registrar(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'correo' => 'required|email|unique:administradores,correo',
        'usuario' => 'required|string|unique:administradores,usuario',
        'contraseña' => 'required|string|min:8|confirmed', // Asegúrate de que coincida con la base de datos
    ]);

    // Crear un nuevo administrador
    $administrador = new Administrador();
    $administrador->nombre = $request->nombre;
    $administrador->apellido = $request->apellido;
    $administrador->correo = $request->correo;
    $administrador->usuario = $request->usuario;
    $administrador->contraseña = Hash::make($request->contraseña); // Hashear la contraseña
    $administrador->imagen = 'ruta/a/imagen_por_defecto.jpg'; // Imagen por defecto
    $administrador->rol = 'admin'; // Rol por defecto
    $administrador->estado = 'activo'; // Estado por defecto
    $administrador->save();

    // Redirigir al formulario de login con un mensaje de éxito
    return redirect()->route('administradores.login')->with('success', 'Administrador registrado exitosamente. Inicia sesión.');
}
}