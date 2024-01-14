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
            $arraydeDetails = $cart->getOrderDetails();

            $result = $cart->getAllOrderDetails($uniqueID);
            $arrayDetails = $cart->getOrderDetails();
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['userLogged'])) {
                // Verifies if we have pressed "Finalizar compra" button
                if (isset($_POST["divBuyButton"])) {
                    $p=0;
                    //let´s set the order, we need date, userID, stateofPayment and deliveryAddress
                    $cart->setOrderDateByTimestamp();
                    $cart->setClientIdFromSessions();
                    $cart->setStateOfPayment("por pagar");
                    $cart->setDeliveryAddressFromSessionsUser();
                    $cart->createNewOrder();
                    $orderID=$cart->getOrderIdFromLastOrder();



                    //let´s set the orderDetails now, we already have the ProductID, we need orderID, amount,
                    //isReturned, UnitPrize and Subtotal
                    $arrayOfDetails=$cart->getOrderDetails();
                    while($p<$arrayLenght){
                        $arrayOfDetails[$p]->setOrderID($orderID);
                        $amountPurchase=$_POST['amount'.$p];
                        $arrayOfDetails[$p]->setAmount($amountPurchase);
                        $arrayOfDetails[$p]->setReturned('no');
                        $prizePerUnitOfThisProduct= $arrayOfDetails[$p]->getProductPrizeUsingProductID();
                        $arrayOfDetails[$p]->setUnitPrize($prizePerUnitOfThisProduct);
                        $subTotal=($amountPurchase*$prizePerUnitOfThisProduct);
                        $arrayOfDetails[$p]->setSubtotal($subTotal);
                    }
                    $cart->setOrderDetails($arrayOfDetails[]);
                    $cart->createAllOrderDetails($arrayLenght);
                }
            } elseif($_SERVER["REQUEST_METHOD"] == "POST"){
                header("Location:".base_url."user/login");

            }else{
                require_once 'app/views/cart/index.php';
            }
        } else {
            echo "La cookie 'nombreDeLaCookie' no está establecida.";
        }

    }
}