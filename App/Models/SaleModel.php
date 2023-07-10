<?php

namespace App\Models;

use App\Entities\Sale;
use App\Models\DatabaseConnection;

class SaleModel
{
    public function create(Sale $sale)
    {
        $product_id = $sale->getProductId();
        $quantity = $sale->getQuantity();
        $total_amount = $sale->getTotalAmount();

        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->prepare('INSERT INTO sales (product_id, quantity, total_amount) VALUES (:product_id, :quantity, :total_amount)');
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':total_amount', $total_amount);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao gravar produtos do banco de dados: ' . $e->getMessage());
        }
    }
}
