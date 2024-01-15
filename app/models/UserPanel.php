<?php

class UserPanel
{

    private $id;
    private $orderDate;
    private $customerID;
    private $paymentState;
    private $deliveryAdress;


    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllOrders()
    {
        $result = false;
        $cartHasOrder = false;
        $usuario= $_SESSION['userLogged'];
        $result = $this->db->query(
            "SELECT dp.*
			FROM EcommerceDB.Pedidos dp
            INNER JOIN EcommerceDB.Clientes c on dp.ID_Cliente = c.ID_Cliente
            WHERE c.Usuario= '$usuario';"
        );
        if (!$result) {
            echo "DatabaseKO";
            die('Error: ' . mysqli_error($this->db));
        } else {
            if (mysqli_num_rows($result) == 0) {
                //mysqli_close($this->db);
                // echo "Aún no has hecho ninguna compra";
                
                return false;
            } else {
                return $result;
            }
        }


    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->orderDate;
    }

    /**
     * @param mixed $orderDate
     */
    public function setOrderDate($orderDate): void
    {
        $this->orderDate = $orderDate;
    }

    /**
     * @return mixed
     */
    public function getCustomerID()
    {
        return $this->customerID;
    }

    /**
     * @param mixed $customerID
     */
    public function setCustomerID($customerID): void
    {
        $this->customerID = $customerID;
    }

    /**
     * @return mixed
     */
    public function getPaymentState()
    {
        return $this->paymentState;
    }

    /**
     * @param mixed $paymentState
     */
    public function setPaymentState($paymentState): void
    {
        $this->paymentState = $paymentState;
    }

    /**
     * @return mixed
     */
    public function getDeliveryAdress()
    {
        return $this->deliveryAdress;
    }

    /**
     * @param mixed $deliveryAdress
     */
    public function setDeliveryAdress($deliveryAdress): void
    {
        $this->deliveryAdress = $deliveryAdress;
    }


}