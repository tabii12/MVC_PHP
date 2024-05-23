<?php
    class ListModel{
        private $list;

        public function __construct(){
            $this->list = new Database();
        }

        public function getList(){
            $sql = "SELECT * FROM list";
            return $this->list->getAll($sql);
        }
    }