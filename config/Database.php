<?php 
class Database {
    private $host = 'localhost';
    private $database_name = 'scandiweb';
    private $username = 'root';
    private $password = '';
    private $db_connect;

    // Method for Database Connection
    public function connectDatabase() {
        $this->db_connect = null;

        try {
            $this->db_connect = new PDO('mysql:host=' .$this->host . ';dbname=' .$this->database_name, $this->username, $this->password);
            $this->db_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        return $this->db_connect;
    }
}