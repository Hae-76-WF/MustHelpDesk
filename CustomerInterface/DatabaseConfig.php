<?php

    class dbconnect{
        private string $host;
        private string $password;
        private string $db;
        private int $port;
        private string $user;
        public $conn;

        public function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->password = '';
            $this->port = 3306;
            $this->db = "musthelpdesk_db";

            try{
                $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                echo "Something Went wrong \n" . $e->getMessage();
            }
        }

        function addData($stateQuery): bool{
            try {
                $this->conn->exec($stateQuery);
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        function getData($query){
            try{
                $statement = $this->conn->prepare($query);
                $statement->execute();
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                return $statement->fetchAll();
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }


        function CloseConnection(): void{
            $this->conn = null;
        }

    }


?>


