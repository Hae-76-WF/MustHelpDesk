<?php 
    class Database {
        private $host = "localhost";
        private $database_name = "musthelpdesk_db";
        private $username = "root";
        private $password = "+256794172442";
        private $port = 3306;
        public $conn;
        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";port=$this->port;dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>