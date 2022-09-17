<?php

namespace App\Database;

use PDO;

class DB
{
    private PDO $pdo;

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_DATABASE'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $this->pdo = new PDO($dsn, $username, $password, $options);

        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function execute(string $query, array $binds = []): \PDOStatement
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($binds);

        return $stmt;
    }

    public static function query(string $query, array $binds = []): \PDOStatement
    {
        return (new DB())->execute($query, $binds);
    }

    public static function select(string $query, array $params = []): array
    {
        return (new DB())->execute($query, $params)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function insert(string $query, array $params = []): int|false
    {
        $pdo = new DB();

        $pdo->execute("$query", $params)->fetchAll(\PDO::FETCH_ASSOC);

        $id = $pdo->pdo->lastInsertId();

        if ($id) {
            return (int) $id;
        } else {
            return false;
        }
    }
}
