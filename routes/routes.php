<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\ProductController;
use App\Controllers\ProductTypeController;
use App\Controllers\TaxPercentageController;

$app->get('/products', function (Request $request, Response $response, $args) {

    $productController = new ProductController();
    $response = $response
        ->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
        ->withHeader('Access-Control-Allow-Methods', 'GET')
        ->withHeader('Access-Control-Allow-Headers', 'Content-Type');
    return $productController->getAllProducts($request, $response);
});

$app->post('/products', function (Request $request, Response $response, $args) {
    $data = $request->getParsedBody();
    $products = $data['products'];
    $productController = new ProductController();
    $productController->createProduct($products);
    return $response->withStatus(201)->withJson(['message' => 'Successfully registered products']);
});

$app->post('/products_type', function (Request $request, Response $response, $args) {
    $name = $request->getParsedBody();
    $productTypeController = new ProductTypeController();
    $productTypeController->create($name);
    return $response->withStatus(201)->withJson(['message' => 'Successfully registered products types']);
});

$app->post('/tax', function (Request $request, Response $response, $args) {
    $data = $request->getParsedBody();
    $taxPercentageController = new TaxPercentageController();
    $taxPercentageController->create($data);
    return $response->withStatus(201)->withJson(['message' => 'Successfully registered tax percentage']);
});
