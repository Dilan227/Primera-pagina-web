<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Tienda de Ropa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="bg-dark text-white p-3">
        <h1 class="text-center">Tienda de Ropa</h1>
    </header>

    {{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('inicio') }}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth('admin')
                <li class="nav-item"><a class="nav-link" href="{{ route('administradores.listado') }}">administradores</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('clientes.listado') }}">Clientes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('productos.listado') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categorias.listado') }}">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('marcas.listado') }}">Marcas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tallas.listado') }}">Tallas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('tipos.listado') }}">Tipos</a></li>
                @endauth
            </ul>

            {{-- Login/Registro/Logout --}}
            <ul class="navbar-nav ms-auto">
                @auth('admin')
                    <li class="nav-item">
                        <span class="nav-link">Hola, {{ Auth::guard('admin')->user()->nombre }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('administradores.logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Cerrar Sesión</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administradores.login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('administradores.registro') }}">Registrar Administrador</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

    {{-- Carrusel (solo para la página de inicio) --}}
    @if (Route::currentRouteName() == 'inicio')
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="true">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="display: block;-webkit-user-select: none;margin: auto;cursor: zoom-in;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;"
                        src="https://i.pinimg.com/736x/08/a4/36/08a43619bb06383302d14b872c33bf47.jpg" width="608"
                        height="433">
                </div>

                <div class="carousel-item">
                    <img style="display: block;-webkit-user-select: none;margin: auto;cursor: zoom-in;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;"
                        src="https://novalight.ua/wp-content/uploads/2017/09/N.-UNO-PORTER_Lavina_mall_Nova-light_4-e1549446725387.jpg"
                        width="608" height="433">
                </div>

                <div class="carousel-item">
                    <img style="display: block;-webkit-user-select: none;margin: auto;cursor: zoom-in;background-color: hsl(0, 0%, 90%);transition: background-color 300ms;"
                        src="https://i.pinimg.com/originals/5a/17/7a/5a177a4096a97451cf1877fdc006e75b.jpg"
                        width="608" height="433">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

    {{-- Contenido principal --}}
    <main class="container my-4">
        @yield('contenido')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark text-white text-center p-3">
        <p>&copy; 2025 Tienda de Ropa. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/validaciones.js') }}"></script>
</body>

</html>