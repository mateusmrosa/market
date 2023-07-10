<?php

namespace App\Controllers;

use App\Entities\TaxPercentage;
use App\Models\TaxPercentageModel;
use Slim\Http\Response;

class TaxPercentageController
{
    public function create($data)
    {
        $taxPercentageModel = new TaxPercentageModel();
        $taxPercentage = new TaxPercentage();

        $taxPercentage->setPercentage($data['percentage']);
        $taxPercentage->setTypeId($data['type_id']);
        $taxPercentageModel->create($taxPercentage);
    }

    public function getAll(Response $response)
    {
        $taxPercentageModel = new TaxPercentageModel();
        $taxPercentage = $taxPercentageModel->getAll();
        $response->getBody()->write(json_encode($taxPercentage));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
