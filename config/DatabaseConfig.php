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
            $this->password = '+256794172442';
            $this->port = 3306;
            $this->db = "musthelpdesk_db";
            try{
                $this->conn = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->db", $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                echo "Something Went wrong \n" . $e->getMessage();
            }

        }

        /**
         * @param $stateQuery
         * @return bool
         */
        function addData($stateQuery): bool
        {
            $status = false;
            try {
                $status = $this->conn->exec($stateQuery);
            } catch (PDOException $e) {
                //echo $e->getMessage();
                echo '<script>alert("'.$e->getMessage().'")</script>';
            }
            return $status;

        }

        /**
         * @param $query
         * @return array|false|void
         */
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

    class dbconnect_Msqli{
        private string $host;
        private string $password;
        private string $db;
        private int $port;
        private string $user;
        public mysqli $conn;
        public function __construct(){
            $this->host = "localhost";
            $this->user = "root";
            $this->password = 'student';
            $this->port = 3307;
            $this->db = "musthelpdesk_db";
            try{
                $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db,$this->port);
            }catch (mysqli_sql_exception $e){
                echo $e->getMessage();
            }catch (Exception $e){
                echo $e->getMessage();
            }

        }
        public function closeConnection(): void{
            mysqli_close($this->conn);
        }
    }


?>


