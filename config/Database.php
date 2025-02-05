<?php 
namespace Config;

require __DIR__ . "/../vendor/autoload.php";

use PDO;
use PDOException;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class Database {
    private $pdo;
    private static $instance = null;

    private function __construct() {
        $db_host = $_ENV["DB_HOST"];
        $db_name = $_ENV["DB_NAME"];
        $port = $_ENV["PORT"];
        $username = $_ENV["DB_USERNAME"];
        $password = $_ENV["DB_PASSWORD"];
        try {
            $this->pdo = new PDO("pgsql:host=$db_host;dbname=$db_name;port=$port", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "failed to connect: " . $e->getMessage(); 
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance->pdo;
    }
}

