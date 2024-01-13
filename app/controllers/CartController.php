<?php
require_once 'app/models/cart.php';
require_once 'app/models/OrderDetails.php';
class CartController{

    public function index(){
        if (isset($_COOKIE['cookieArray'])) {
            $valor = $_COOKIE['cookieArray'];
            require_once 'app/views/cart/index.php';
            echo "El valor de la cookie es: " . $valor;
        } else {
            echo "La cookie 'nombreDeLaCookie' no está establecida.";
        }

    }

}