<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\ProductController;
use App\Controllers\ProductTypeController;
use App\Controllers\TaxPercentageController;

$app->get('/products', function (Request $request, Response $response, $args) {
    $controller = new ProductController();
    return $controller->getAllProducts($request, $response, $args);
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

