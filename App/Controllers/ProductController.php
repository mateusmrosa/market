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

        $data = array();
        foreach ($products as $row) {
            $entry = array(
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price'],
                'prod_type_id' => $row['prod_type_id'],
                'prod_type_name' => $row['prod_type_name'],
                'prod_type_percentage' => $row['prod_type_percentage']
            );
            $data[] = $entry;
        }
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function createProduct(array $data)
    {
        $productModel = new ProductModel();
        $product = new Product();
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setTypeId($data['type_id']);
        $productModel->createProducts($product);
    }
}
