<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Entities\Sale;
use App\Models\SaleModel;

class SaleController
{
    public function create(array $data)
    {
        $saleModel = new SaleModel();
        foreach ($data as $saleData) {
            $sale = new Sale();
            $sale->setProductId($saleData['product_id']);
            $sale->setQuantity($saleData['quantity']);
            $sale->setTotalAmount($saleData['totalAmount']);
            $saleModel->create($sale);
        }
    }
}
