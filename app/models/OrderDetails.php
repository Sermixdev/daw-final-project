<?php

class OrderDetails
{
private $detailID;
private $orderID;
private $productID;
private $amount;
private $returned;
private $unitPrize;
private $subtotal;

    public function __construct(){
        $this->db = Database::connect();
    }

    /**
     * @return mixed
     */
    public function getDetailID()
    {
        return $this->detailID;
    }

    /**
     * @param mixed $detailID
     */
    public function setDetailID($detailID): void
    {
        $this->detailID = $detailID;
    }

    /**
     * @return mixed
     */
    public function getOrderID()
    {
        return $this->orderID;
    }

    /**
     * @param mixed $orderID
     */
    public function setOrderID($orderID): void
    {
        $this->orderID = $orderID;
    }

    /**
     * @return mixed
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @param mixed $productID
     */
    public function setProductID($productID): void
    {
        $this->productID = $productID;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getReturned()
    {
        return $this->returned;
    }

    /**
     * @param mixed $returned
     */
    public function setReturned($returned): void
    {
        $this->returned = $returned;
    }

    /**
     * @return mixed
     */
    public function getUnitPrize()
    {
        return $this->unitPrize;
    }

    /**
     * @param mixed $unitPrize
     */
    public function setUnitPrize($unitPrize): void
    {
        $this->unitPrize = $unitPrize;
    }

    /**
     * @return mixed
     */
    public function getSubtotal()
    {
        return $this->subtotal;
    }

    /**
     * @param mixed $subtotal
     */
    public function setSubtotal($subtotal): void
    {
        $this->subtotal = $subtotal;
    }


}