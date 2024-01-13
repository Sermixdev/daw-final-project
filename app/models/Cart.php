<?php

class Cart
{
    private $order_date;
    private $clientID;
    private $stateOfPayment;
    private $deliveryAdress;
    private $orderDetails = [];


    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getOrderDate()
    {
        return $this->order_date;
    }

    /**
     * @param mixed $order_date
     */
    public function setOrderDate($order_date): void
    {
        $this->order_date = $order_date;
    }

    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->clientID;
    }

    /**
     * @param mixed $clientID
     */
    public function setClientID($clientID): void
    {
        $this->clientID = $clientID;
    }

    /**
     * @return mixed
     */
    public function getStateOfPayment()
    {
        return $this->stateOfPayment;
    }

    /**
     * @param mixed $stateOfPayment
     */
    public function setStateOfPayment($stateOfPayment): void
    {
        $this->stateOfPayment = $stateOfPayment;
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

    /**
     * @return array
     */
    public function getOrderDetails(): array
    {
        return $this->orderDetails;
    }

    /**
     * @param array $orderDetails
     */
    public function setOrderDetails(array $orderDetails): void
    {
        $this->orderDetails = $orderDetails;
    }

    public function getAllOrderDetails($uniqueID)
    {
        $idString = implode(',', $uniqueID);
        $noBrackets = str_replace('""', '"', $idString);
        $noBracketsIds = str_replace('"', '', $noBrackets);
        $result = $this->db->query("SELECT * FROM EcommerceDB.productos WHERE ID_Producto IN ($noBracketsIds);");
        if (!$result) {
            echo "DatabaseKO";
            die('Error: ' . mysqli_error($this->db));
        } else {
            if (mysqli_num_rows($result) == 0) {
                //mysqli_close($this->db);
                echo "noProductsFound";
            } else {
                return $result;
            }
        }
    }

}