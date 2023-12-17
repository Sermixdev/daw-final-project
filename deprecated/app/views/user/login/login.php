<?php
// Ruta completa del archivo actual (login.php)
$rutaActual = str_replace('\\', '/', __DIR__); // Normalizar barras diagonales

// Directorio que deseas obtener (app/views/user/login)
$directorioDeseado = 'app/views/user/login';

// Normalizar barras diagonales en el directorio deseado
$directorioDeseado = str_replace('\\', '/', $directorioDeseado);

// Encuentra la posición del directorio deseado en la ruta actual
$posicion = strpos($rutaActual, $directorioDeseado);

if ($posicion !== false) {
    // Obtiene la parte de la ruta anterior al directorio deseado
    $rutaAnterior = substr($rutaActual, 0, $posicion);

    // Imprime la ruta anterior y la constante BASE_PATH
    $rutaAnterior = str_replace('/', '\\', $rutaAnterior);


    define('BASE_PATH', $rutaAnterior);

// Ajustar la expresión regular
    $patron = '/.*\/htdocs/';

// Normalizar barras diagonales en la ruta anterior
    $rutaAnterior = str_replace('\\', '/', $rutaAnterior);

// Intentar reemplazar la parte antes de /htdocs con http://localhost
    $rutaParaHTML = preg_replace($patron, 'http://localhost', $rutaAnterior);

    // crear BASEHTML_PATH
    define('BASEHTML_PATH', $rutaParaHTML);
} else {
    echo "El directorio deseado no se encontró en la ruta actual.";
}

include(BASE_PATH.'app/controllers/UserController.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<link rel="stylesheet" href="http://localhost/workspace/public/assets/css/styles.css" /> -->
    <link rel="stylesheet" href=<?php echo BASEHTML_PATH."public/assets/css/styles.css" ?> />
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>

    <title>Login</title>
</head>
<body>
<?php
include(BASE_PATH.'app/includes/header.php');
include('login.html');
include(BASE_PATH.'app/includes/footer.php');
?>
<script type="module" src="<?php echo BASEHTML_PATH . 'public/assets/js/login.js'?>"></script>

</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    login($userName, $password);
}
?>
</html>