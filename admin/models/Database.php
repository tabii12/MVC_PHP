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
            }catch(PDOException $e){ 
                echo 'something when wrong';
            }
        }

        public function query($sql, $param = []) {
            try {
                $this->stmt = $this->conn->prepare($sql);
                if (!empty($param)) {
                    foreach ($param as $key => $value) {
                        $this->stmt->bindValue($key + 1, $value); // PDO parameters are 1-indexed
                    }
                }
                $this->stmt->execute();
                return $this->stmt;
            } catch (PDOException $e) {
                echo 'Query error: ' . $e->getMessage();
            }
        }

        public function getAll($sql){
            $statement = $this->query($sql);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getOne($sql){
            $statement = $this->query($sql);
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public function insert($sql, $param) {
            $this->query($sql, $param);
            return $this->conn->lastInsertId();
        }

        public function delete($sql, $param) {
            $this->query($sql, $param);
        }

        public function update($sql, $params) {
            $this->query($sql, $params);
        }

        public function __destruct(){
            unset($this->conn);
        }
         
    }