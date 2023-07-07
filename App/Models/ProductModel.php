<?php

namespace App\Models;

use App\Entities\Product;
use App\Models\DatabaseConnection;

class ProductModel
{
    public function getById($id)
    {
        // Implemente a lógica para obter um produto pelo ID do banco de dados ou outro meio de armazenamento
    }

    public static function getAll()
    {
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->query('SELECT pt.name AS type_name, p.name AS product_name, p.price
                                  FROM product_types pt
                                  JOIN products p ON pt.product_id = p.id;');
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao obter produtos do banco de dados: ' . $e->getMessage());
        }
    }

    public function createProducts(Product $product)
    {
        $name = $product->getName();
        $prime = $product->getPrice();
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->prepare('INSERT INTO products (name, price) VALUES (:name, :price)');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':price', $prime);
            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception('Erro ao gravar produtos do banco de dados: ' . $e->getMessage());
        }
    }
}
