<?php
use Tuupola\Middleware\CorsMiddleware;

//config para o CORS do browser
$app->add(function ($request, $response, $next) {
    $response = $next($request, $response);
    $response = $response
        ->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE')
        ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    return $response;
});

$app->add(new CorsMiddleware([
    "origin" => ["http://localhost:3000"],
    "methods" => ["GET", "POST", "PUT", "DELETE"],
    "headers.allow" => ["Content-Type", "Authorization"],
]));
