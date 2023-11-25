<?php
    echo '
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Cart</title>
        </head>
        <body>';
    include(__DIR__ . '/../../includes/header.php');
    include('cart.html');
    include(__DIR__ . '/../../includes/footer.php');
    echo '</body>';
?>