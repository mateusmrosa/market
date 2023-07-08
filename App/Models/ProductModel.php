<?php

namespace App\Models;

use App\Entities\Product;
use App\Models\DatabaseConnection;

class ProductModel
{
    public function getAllProducts()
    {
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->query('SELECT * FROM products');
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao obter produtos do banco de dados: ' . $e->getMessage());
        }
    }

    public function createProducts(Product $product)
    {
        $name = $product->getName();
        $price = $product->getPrice();
        $type_id = $product->getTypeId();
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->prepare('INSERT INTO products (name, price, type_id) VALUES (:name, :price, :type_id)');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':type_id', $type_id);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao gravar produtos do banco de dados: ' . $e->getMessage());
        }
    }
}
