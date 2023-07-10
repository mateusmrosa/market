<?php
require 'vendor/autoload.php';

$app = new \Slim\App();

require 'routes/routes.php';

require './App/Controllers/ProductController.php';
require './App/Controllers/ProductTypeController.php';
require './App/Controllers/TaxPercentageController.php';
require './App/Controllers/SaleController.php';

require './App/Entities/Product.php';
require './App/Entities/ProductType.php';
require './App/Entities/TaxPercentage.php';
require './App/Entities/Sale.php';

require './App/Models/ProductModel.php';
require './App/Models/ProductTypeModel.php';
require './App/Models/TaxPercentageModel.php';
require './App/Models/SaleModel.php';

require './App/DataBase/DatabaseConnection.php';

$app->run();
