<?php
require 'vendor/autoload.php';

$app = new \Slim\App();

require 'routes/routes.php';
require './App/Controllers/ProductController.php';
require './App/Entities/Product.php';
require './App/Models/ProductModel.php';
require './App/DataBase/DatabaseConnection.php';

$app->run();
