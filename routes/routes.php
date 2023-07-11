<?php

use App\Controllers\AuthController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\ProductController;
use App\Controllers\ProductTypeController;
use App\Controllers\TaxPercentageController;
use App\Controllers\SaleController;

// config cors
require_once 'cors.php';

//start routes

$app->post('/login', function (Request $request, Response $response, $args) {
    $authController = new AuthController();
    $data = array(
        'email' => $request->getParam('email'),
        'password' => $request->getParam('password')
    );
    $result = $authController->login($data, $response);
    return $result;
    
});

$app->get('/products', function (Request $request, Response $response, $args) {
    $productController = new ProductController();
    return $productController->getAllProducts($request, $response);
});


$app->get('/products_type', function (Request $request, Response $response, $args) {
    $productTypeController = new ProductTypeController();
    return $productTypeController->getAll($response);
});


$app->post('/products', function (Request $request, Response $response, $args) {

    $data = [
        'name' => $request->getParam('name'),
        'price' => $request->getParam('price'),
        'type_id' => $request->getParam('type_id')
    ];

    $productController = new ProductController();

    $productController->createProduct($data);

    $response = $response
        ->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
        ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');

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

$app->get('/tax', function (Request $request, Response $response, $args) {
    $taxPercentageController = new TaxPercentageController();
    return $taxPercentageController->getAll($response);
});


$app->post('/sales', function (Request $request, Response $response, $args) {
    $dataProductSale = $request->getParsedBody();
    $saleController = new SaleController();
    $saleController->create($dataProductSale);
    return $response->withStatus(201)->withJson(['message' => 'Successfully registered products']);
});
