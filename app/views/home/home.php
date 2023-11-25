<?php
    echo '
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="./public/assets/css/styles.css">
            <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet" />
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>
            
            <title>Inicio</title>
        </head>
        <body>';
    include(__DIR__ . '/../../includes/header.php');
    include('home.html');
    include(__DIR__ . '/../../includes/footer.php');
    echo '
    <script type="module" src="./public/assets/js/home.js"></script>
    </body>';
?>