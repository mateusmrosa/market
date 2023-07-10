<?php

namespace App\Entities;

class Sale
{
    private $id;
    private $product_id;
    private $quantity;
    private $total_amount;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getTotalAmount()
    {
        return $this->total_amount;
    }

    public function setTotalAmount($total_amount)
    {
        $this->total_amount = $total_amount;
    }
}
