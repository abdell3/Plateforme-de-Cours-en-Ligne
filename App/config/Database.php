<?php
class Database {
    
    private static $instance = null;
    
    
    private $connection;

    private $host = "localhost";    
    private $dbname = "youdemy";    
    private $username = "root";     
    private $password = "";     

    private function __construct() {
        try {
            
            $this->connection = new PDO(
                "mysql:host=" . $this->host . 
                ";dbname=" . $this->dbname, 
                $this->username, 
                $this->password
            );
            
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            exit();
        }
    }

    public static function getInstance() {
        
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance->connection;
    }

    
    public function __clone() {}

    public function __wakeup() {}
}
?>
