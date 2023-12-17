<?php
//Buscar un usuario en el que coincidan ese nombre de usuario y contraseña
include (__DIR__ . '/../../config/database.php');
$con = conectar();
function checkCombinationUserPass($userName,$userPass){
    global $con;
    $query = "select Usuario FROM EcommerceDB.clientes 
             WHERE Usuario='$userName' AND Password='$userPass'";
    $resultado= mysqli_query($con,$query);
    if (!$resultado){
        die('Error: '. mysqli_error($con));
    }
}

?>