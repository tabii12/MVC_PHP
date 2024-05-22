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
            } catch(PDOException $e) {
            }
        }

        public function getAll($sql){
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
            // $this->result = $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }