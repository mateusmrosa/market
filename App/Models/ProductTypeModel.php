<?php

namespace App\Models;

use App\Entities\ProductType;
use App\Models\DatabaseConnection;

class ProductTypeModel
{
    // public static function getAll()
    // {
    //     $db = new DatabaseConnection();
    //     try {
    //         $conn = $db->connect();
    //         $stmt = $conn->query('SELECT * from products');
    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         throw new \Exception('Erro ao obter produtos do banco de dados: ' . $e->getMessage());
    //     }
    // }

    public function create(ProductType $productType)
    {
        $name = $productType->getName();
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->prepare('INSERT INTO product_types (name) VALUES (:name)');
            $valueName = implode(', ', $name);
            $stmt->bindParam(':name', $valueName);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao gravar tipos de produtos do banco de dados: ' . $e->getMessage());
        }
    }
    
}
