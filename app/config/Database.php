<?php
namespace App\config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database {
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            $dotenv = Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            $host = $_ENV['DB_HOST'];
            $db_name = $_ENV['DB_NAME'];
            $username = $_ENV['DB_USER'];
            $password = $_ENV['DB_PASS'];

            try {
                self::$conn = new PDO("pgsql:host=$host;dbname=$db_name", $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $exception) {
                die("Connection error: " . $exception->getMessage());
            }
        }
        return self::$conn;
    }
}