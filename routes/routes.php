<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Controllers\ProductController;

$app->get('/products', function (Request $request, Response $response, $args) {
    $controller = new ProductController();
    return $controller->getAllProducts($request, $response, $args);
});

$app->post('/products', function (Request $request, Response $response, $args) {
    $data = $request->getParsedBody();
    $products = $data['products'];

    $productController = new ProductController();
    $productController->createProduct($products);

    return $response->withStatus(201)->withJson(['message' => 'Produtos cadastrados com sucesso']);
});
