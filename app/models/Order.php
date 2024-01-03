<?php

class Order
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