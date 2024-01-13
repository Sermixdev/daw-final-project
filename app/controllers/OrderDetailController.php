<?php
require_once 'app/models/OrderDetails.php';

class OrderDetailController
{
    public function index()
    {
        $result = false;
        if (isset($_GET['order']) && isset($_SESSION['userLogged'])) {
            $order = $_GET['order'];
            $user = $_SESSION['userLogged'];
            $orderDetail = new OrderDetails();
            $orderDetail->setOrderID($order);
            $result = $orderDetail->getAllDetailsFromThisOrder($user);
            if ($result === false) {
                echo "DatabaseKO";
            } else {
                if (mysqli_num_rows($result) == 0) {
                    //mysqli_close($this->db);
                    echo "noOrderFound";
                    header("Location:" . base_url . "error/index");
                } else {
                    require_once 'app/views/orderDetails/index.php';
                }
            }

        } else {
            header("Location:" . base_url . "error/index");
        }
    }
}
