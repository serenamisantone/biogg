<?php 

class DbConnection {
    private static $instance; // Istanza della connessione al database
    private $connection; // Connessione al database
    
    private function __construct() {
        // Configurazione delle credenziali del database
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'biogg';
        
        // Creazione della connessione
        $this->connection = new mysqli($host, $username, $password, $database);
        
        // Controllo degli errori di connessione
        if ($this->connection->connect_error) {
            die('Errore di connessione al database: ' . $this->connection->connect_error);
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DbConnection();
        }
        
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
}
