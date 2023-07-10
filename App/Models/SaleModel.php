<?php

namespace App\Models;

use App\Entities\Product;
use App\Models\DatabaseConnection;

class SaleModel
{
    public function getAllProducts()
    {
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->query('SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, 
                                  pt.id AS prod_type_id, pt.name AS prod_type_name, 
                                  tp.percentage AS prod_type_percentage
                                  FROM products AS p
                                  JOIN product_types AS pt ON p.type_id = pt.id
                                  JOIN tax_percentages AS tp ON pt.id = tp.type_id
                                  GROUP BY p.id, p.name, p.price, pt.id, pt.name, tp.percentage;');
            return $stmt->fetchAll(\PDO::FETCH_BOTH);
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
