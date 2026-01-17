<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Feedback{
    private PDO $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

     public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM feedbacks ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(string $name, string $comment): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO feedbacks (name, comment) VALUES (:name, :comment)"
        );

        return $stmt->execute([
            ':name' => $name,
            ':comment' => $comment
        ]);
    }

}