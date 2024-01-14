<?php
require_once 'app/models/Cart.php';
require_once 'app/models/OrderDetails.php';

class CartController
{

    public function index()
    {
        if (isset($_COOKIE['cookieArray'])) {
            $cookieValue = $_COOKIE['cookieArray'];

            // Convertir el string a array si es necesario
            if (!is_array($cookieValue)) {
                $cookieValue = explode(',', trim($cookieValue, '[]'));
            }

            $uniqueID = array();
            $sumaDeID = array();


            // Contar la frecuencia de cada número
            $frecuencia = array_count_values($cookieValue);

            // Recorrer la frecuencia para llenar los arrays uniqueID y sumaDeID
            foreach ($frecuencia as $numero => $cantidad) {
                $uniqueID[] = $numero;
                $sumaDeID[] = $cantidad;
            }
            $arrayLenght = count($uniqueID);
            $i = 1;
            $cart = new Cart();
            $arrayOfDetails = [];
            while ($i <= $arrayLenght) {
                $detail = new OrderDetails();
                $productID = $uniqueID[$i - 1];
                $amount = $sumaDeID[$i - 1];
                $detail->setProductID($productID);
                $detail->setAmount($amount);
                $arrayOfDetails[] = $detail;
                $i++;
            }

            $cart->setOrderDetails($arrayOfDetails);
            $arraydeDetails=$cart->getOrderDetails();

            $result = $cart->getAllOrderDetails($uniqueID);
            $arrayDetails=$cart->getOrderDetails();
            require_once 'app/views/cart/index.php';

        } else {
            echo "La cookie 'nombreDeLaCookie' no está establecida.";
        }

    }

    public function buy(){
        $carrit=$cart;
    }

}