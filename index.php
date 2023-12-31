<?php
session_start();
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'config/database.php';
require_once 'app/includes/header.php';
//conectar con la bbdd
$db=Database::connect();
//crear la base de datos de 0
Database::create_db();
function show_error(){
    $error = new errorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';

}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;

}else{
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controlador = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
    }else{
        show_error();
    }
}else{
    show_error();
}
require_once 'app/includes/footer.php';

?>
<!-- Aquí hay que hacer alguna lógica para que se introduzca un js u otro -->
<!-- <script type="module" src="./public/assets/js/home.js"></script> -->
    </body>

