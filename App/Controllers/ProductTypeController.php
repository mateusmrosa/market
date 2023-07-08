<?php

namespace App\Controllers;

use App\Entities\ProductType;
use App\Models\ProductTypeModel;

class ProductTypeController
{
    public function create($name)
    {
        $producTypeModel = new ProductTypeModel();
        $productType = new ProductType();
        $productType->setName($name);
        $producTypeModel->create($productType);
    }
}
