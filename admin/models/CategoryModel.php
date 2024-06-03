<?php
    class CategoryModel{
        private $category;

        public function __construct(){
            $this->category = new Database();
        }

        public function getCategory(){
            $sql = "SELECT * FROM category";
            return $this->category->getAll($sql);
        }
    }