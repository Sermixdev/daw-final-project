<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQTDKPBG');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?=base_url?>public/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>

    <title>WEB ECOMMERCE</title>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQTDKPBG"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <div class="header-logo">
        <a href="<?=base_url?>"><img src="<?=base_url?>public/images/other/icons/web-logo.png" alt="Logo de la pagina web" /></a>
    </div>
    <div class="header-content">
        <div class="header-content-title">
            <a href="<?=base_url?>"><h1>WEB ECOMMERCE</h1></a>
            <p>Tu web de confianza</p>
        </div>
        <div class="header-content-menu">
            <a href="<?=base_url?>">Inicio</a>
            <a href="<?=base_url?>Product/productlist">Juegos</a>
            <a href="<?=base_url?>AboutUs/index">Sobre nosotros</a>
            <a href="<?=base_url?>Contact/index">Contáctanos</a>
        </div>
    </div>
    <div class="header-userinfo">
        <a id="header-userinfo-username" href="<?=base_url?>user/login">Login</a>
        <a id="header-userinfo-cart" href="<?=base_url?>Cart/index"><img src="<?=base_url?>public/images/other/icons/user-cart.png" alt="Cart" /></a>
    </div>
</header>