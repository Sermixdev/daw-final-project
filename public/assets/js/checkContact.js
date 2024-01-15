document.querySelector('.contactForm').addEventListener('submit', function(e) {
    let nombre = document.getElementById('nombre').value;
    let correo = document.getElementById('correo').value;
    let telefono = document.getElementById('telefono').value;
    let mensaje = document.getElementById('mensaje').value;

    let errors = [];

    if (!nombre) {
        errors.push('El nombre es obligatorio.');
    }

    if (!correo) {
        errors.push('El correo es obligatorio.');
    }

    if (telefono.length != 9) {
        errors.push('El teléfono debe tener 9 caracteres.');
    }

    if (!mensaje) {
        errors.push('Escribe tu pregunta o comentario.');
    }

    if (errors.length > 0) {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: errors.join('<br/>'),
        });
    }
});