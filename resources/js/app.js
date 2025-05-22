import './bootstrap';
// Efecto hover para la imagen
document.addEventListener('DOMContentLoaded', function () {
    const imagen = document.querySelector('.animated-image');

    if (imagen) {
        imagen.addEventListener('mouseenter', () => {
            imagen.style.transform = 'scale(1.1)';
            imagen.style.transition = 'transform 0.3s ease';
        });

        imagen.addEventListener('mouseleave', () => {
            imagen.style.transform = 'scale(1)';
        });
    }
});