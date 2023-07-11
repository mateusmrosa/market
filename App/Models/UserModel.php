<?php

namespace App\Models;

use App\Entities\User;
use App\Models\DatabaseConnection;
use PDO;

class UserModel
{
    public function get(User $user)
    {
        $email = $user->getEmail();
        $db = new DatabaseConnection();
        try {
            $conn = $db->connect();
            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
