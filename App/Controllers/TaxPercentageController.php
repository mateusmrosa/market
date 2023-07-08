<?php

namespace App\Controllers;

use App\Entities\TaxPercentage;
use App\Models\TaxPercentageModel;

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
}
