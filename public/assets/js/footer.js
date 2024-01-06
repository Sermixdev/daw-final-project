// Select the button and input
let button = document.querySelector('.footer-button-newsletter');
let input = document.querySelector('.footer-newsletter-input');

// Add a listen event to the button
button.addEventListener('click', function () {
    // Collect the value of the input
    let email = input.value;

    // Create a regular expression to validate emails
    let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

    // Check if the email is valid
    if (emailRegex.test(email)) {
        Swal.fire('¡Suscripción exitosa!', 'Gracias por suscribirte a nuestra newsletter, ' + email + '!', 'success');
        input.value = '';
    } else {
        Swal.fire('Error', 'Por favor, introduce un email válido.', 'error');
    }
});
export {};
