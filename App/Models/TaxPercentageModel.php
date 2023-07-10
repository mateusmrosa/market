<?php

namespace App\Models;

use App\Entities\TaxPercentage;
use App\Models\DatabaseConnection;

class TaxPercentageModel
{
    public function create(TaxPercentage $taxPercentage)
    {
        $percentage = $taxPercentage->getPercentage();
        $type_id = $taxPercentage->getTypeId();

        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->prepare('INSERT INTO tax_percentages (percentage, type_id) VALUES (:percentage, :type_id)');
            $stmt->bindParam(':percentage', $percentage);
            $stmt->bindParam(':type_id', $type_id);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao gravar produtos do banco de dados: ' . $e->getMessage());
        }
    }

    public function getAll()
    {
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->query('SELECT pt.id, pt.name, tp.percentage
                                  FROM   product_types   as pt
                                  JOIN   tax_percentages as tp 
                                  ON     pt.id = tp.type_id;');
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao obter produtos do banco de dados: ' . $e->getMessage());
        }
    }
}
