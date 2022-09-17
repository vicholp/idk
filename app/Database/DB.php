<?php

namespace App\Database;

use PDO;

/**
 * Provides methods to interact with the database.
 *
 * You can use select(), insert(), query() to perform basic queries, or getPdo() to
 * get the PDO instance and perform more complex queries.
 */
class DB
{
    private PDO $pdo;

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

    /**
     * Return pdo instance.
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function execute(string $query, array $binds = []): \PDOStatement
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($binds);

        return $stmt;
    }

    /**
     * Execute any query and return the full pdo statement.
     *
     * @param string $query SQL query
     * @param array  $binds Array of binds to be used in the query
     */
    public static function query(string $query, array $binds = []): \PDOStatement
    {
        return (new DB())->execute($query, $binds);
    }

    /**
     * Execute a query and fetch all results.
     *
     * @param string $query  SQL query to execute
     * @param array  $params Array of binds to use in the query
     *
     * @return array Array of results
     */
    public static function select(string $query, array $params = []): array
    {
        return (new DB())->execute($query, $params)->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Execute a query and return the last inserted id.
     *
     * @param string $query  SQL query to execute
     * @param array  $params Array of binds to use in the query
     *
     * @return int|false id of the inserted row or false if failed
     */
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
