<!-- Paths needs change-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=base_url?>public/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>

    <title>WEB ECOMMERCE</title>
</head>
<body>
<header>
    <div class="header-logo">
        <a href="./index.php"><img src="./public/images/other/icons/web-logo.png" alt="Logo de la pagina web" /></a>
    </div>
    <div class="header-content">
        <div class="header-content-title">
            <a href="./index.php"><h1>WEB ECOMMERCE</h1></a>
            <p>Tu web de confianza</p>
        </div>
        <div class="header-content-menu">
            <a href="./index.php">Inicio</a>
            <a href="#games">Juegos</a>
            <a href="#about">Sobre nosotros</a>
        </div>
    </div>
    <div class="header-userinfo">
        <a id="header-userinfo-username" href='app/views/user/login/login.php')>Username</a>
        <a id="header-userinfo-cart" href="#cart"><img src="./public/images/other/icons/user-cart.png" alt="Cart" /></a>
    </div>
</header>