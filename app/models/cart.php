<?php

class cart
{

    private $orden_date;
    private $clientID;
    private $stateOfPayment;
    private $deliveryAdress;
    private $orderDetails = [];


    public function __construct()
    {
        $this->db = Database::connect();
    }
}