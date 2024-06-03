<?php
    class UserModel{
        private $user;

        public function __construct(){
            $this->user = new Database();
        }

        public function getUser(){
            $sql = "SELECT * FROM user";
            return $this->user->getAll($sql);
        }
    }