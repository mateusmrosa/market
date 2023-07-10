<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

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

    public function getAll(Response $response)
    {
        $productTypeModel = new ProductTypeModel();
        $productsType = $productTypeModel->getAll();

        $response->getBody()->write(json_encode($productsType));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
