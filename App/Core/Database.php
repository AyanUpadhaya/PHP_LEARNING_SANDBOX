<?php

namespace App\Core;

use App\Config\DBConfig;
use PDO;

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . DBConfig::HOST . ";dbname=" . DBConfig::NAME . ";charset=utf8";
        $this->pdo = new PDO($dsn, DBConfig::USER, DBConfig::PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}