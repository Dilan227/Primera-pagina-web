document.addEventListener('DOMContentLoaded', function () {

    // Función para mostrar errores
    function mostrarError(input, mensaje) {
        const errorContainer = input.nextElementSibling;
        if (errorContainer && errorContainer.classList.contains('error-message')) {
            errorContainer.textContent = mensaje;
        }
    }

    // Función para limpiar los errores
    function limpiarError(input) {
        const errorContainer = input.nextElementSibling;
        if (errorContainer && errorContainer.classList.contains('error-message')) {
            errorContainer.textContent = '';
        }
    }

    // Validación del formulario de Administradores
    const formAdministradores = document.getElementById('form-administradores');
    if (formAdministradores) {
        formAdministradores.addEventListener('submit', function (e) {
            let esValido = true;

            const nombre = document.getElementById('nombre');
            limpiarError(nombre);
            if (!nombre.value.trim()) {
                esValido = false;
                mostrarError(nombre, 'El nombre es obligatorio.');
            } else if (nombre.value.length < 3 || nombre.value.length > 50) {
                esValido = false;
                mostrarError(nombre, 'El nombre debe tener entre 3 y 50 caracteres.');
            }

            const email = document.getElementById('email');
            limpiarError(email);
            if (!email.value.trim()) {
                esValido = false;
                mostrarError(email, 'El correo es obligatorio.');
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
                esValido = false;
                mostrarError(email, 'Por favor, ingresa un correo válido.');
            }

            if (!esValido) e.preventDefault();
        });
    }

    // Validación del formulario de Categorías
    const formCategorias = document.getElementById('form-categorias');
    if (formCategorias) {
        formCategorias.addEventListener('submit', function (e) {
            let esValido = true;

            const nombreCategoria = document.getElementById('nombre_categoria');
            limpiarError(nombreCategoria);
            if (!nombreCategoria.value.trim()) {
                esValido = false;
                mostrarError(nombreCategoria, 'El nombre de la categoría es obligatorio.');
            } else if (nombreCategoria.value.length < 3 || nombreCategoria.value.length > 50) {
                esValido = false;
                mostrarError(nombreCategoria, 'El nombre debe tener entre 3 y 50 caracteres.');
            }

            if (!esValido) e.preventDefault();
        });
    }

    // Validación del formulario de Clientes
    const formClientes = document.getElementById('form-clientes');
    if (formClientes) {
        formClientes.addEventListener('submit', function (e) {
            let esValido = true;

            const nombreCliente = document.getElementById('nombre_cliente');
            limpiarError(nombreCliente);
            if (!nombreCliente.value.trim()) {
                esValido = false;
                mostrarError(nombreCliente, 'El nombre del cliente es obligatorio.');
            } else if (nombreCliente.value.length < 3 || nombreCliente.value.length > 50) {
                esValido = false;
                mostrarError(nombreCliente, 'El nombre debe tener entre 3 y 50 caracteres.');
            }

            const telefono = document.getElementById('telefono');
            limpiarError(telefono);
            if (!telefono.value.trim()) {
                esValido = false;
                mostrarError(telefono, 'El teléfono es obligatorio.');
            } else if (!/^\d{10}$/.test(telefono.value)) {
                esValido = false;
                mostrarError(telefono, 'El teléfono debe tener 10 dígitos.');
            }

            if (!esValido) e.preventDefault();
        });
    }

    // Validación del formulario de Pedidos
    const formPedidos = document.getElementById('form-pedidos');
    if (formPedidos) {
        formPedidos.addEventListener('submit', function (e) {
            let esValido = true;

            const cliente = document.getElementById('cliente');
            limpiarError(cliente);
            if (!cliente.value.trim()) {
                esValido = false;
                mostrarError(cliente, 'El cliente es obligatorio.');
            }

            const fechaPedido = document.getElementById('fecha_pedido');
            limpiarError(fechaPedido);
            if (!fechaPedido.value.trim()) {
                esValido = false;
                mostrarError(fechaPedido, 'La fecha de pedido es obligatoria.');
            }

            if (!esValido) e.preventDefault();
        });
    }

    // Validación del formulario de Productos
    const formProductos = document.getElementById('form-productos');
    if (formProductos) {
        formProductos.addEventListener('submit', function (e) {
            let esValido = true;

            const nombreProducto = document.getElementById('nombre_producto');
            limpiarError(nombreProducto);
            if (!nombreProducto.value.trim()) {
                esValido = false;
                mostrarError(nombreProducto, 'El nombre del producto es obligatorio.');
            } else if (nombreProducto.value.length < 3 || nombreProducto.value.length > 50) {
                esValido = false;
                mostrarError(nombreProducto, 'El nombre debe tener entre 3 y 50 caracteres.');
            }

            const precio = document.getElementById('precio');
            limpiarError(precio);
            if (!precio.value.trim()) {
                esValido = false;
                mostrarError(precio, 'El precio es obligatorio.');
            } else if (isNaN(precio.value) || precio.value <= 0) {
                esValido = false;
                mostrarError(precio, 'El precio debe ser un número positivo.');
            }

            if (!esValido) e.preventDefault();
        });
    }

});
