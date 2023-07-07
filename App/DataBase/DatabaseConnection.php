<?php

namespace App\Models;

use \PDO;

class DatabaseConnection
{
    private $host = 'localhost';
    private $port = '5432';
    private $user = 'postgres';
    private $pass = 'admin';
    private $dbname = 'market';

    public function connect()
    {
        $conn_str = "pgsql:host=$this->host;port=$this->port;dbname=$this->dbname";
        try {
            $conn = new PDO($conn_str, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Erro na conexão com o banco de dados: " . $e->getMessage());
        }
        return $conn;
    }
}
