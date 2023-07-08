<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Entities\Product;
use App\Entities\ProductType;
use App\Models\ProductModel;

class ProductController
{
    public function getAllProducts(Request $request, Response $response)
    {
        $productModel = new ProductModel();
        $products = $productModel->getAllProducts();

        $response->getBody()->write(json_encode($products));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function createProduct(array $products)
    {
        $productModel = new ProductModel();
        $product = new Product();

        foreach ($products as $productData) {

            $product->setName($productData['name']);
            $product->setPrice($productData['price']);
            $product->setTypeId($productData['type_id']);

            $productModel->createProducts($product);
        }
    }
}
