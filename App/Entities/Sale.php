<?php

namespace App\Entities;

class Sale
{
    private $id;
    private $name;
    private $type_id;
    private $price;

    // public function __construct()
    // {
    //     $this->productType = new ProductType();
    // }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    // public function getProdutType()
    // {
    //     return $this->productType;
    // }
}
