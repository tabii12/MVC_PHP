<?php 

    class Database{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "shop.co";
        private $conn;
        private $stmt;
        private $result;

        public function __construct(){
            try {
                $this->conn = new PDO("mysql:host=$this->servername; dbname=$this->dbname; charset = utf8", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) { echo 'something when wrong';
            }
        }

        public function query($sql){
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
            return $this->stmt;
        }

        public function getAll($sql){
            $statement = $this->query($sql);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOne($sql){
            $statement = $this->query($sql);
            return $statement->fetch(PDO::FETCH_ASSOC);
        }
        
    }