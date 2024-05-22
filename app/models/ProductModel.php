<?php
    class ProductModel{
        private $product;

        public function __construct(){
            $this->product = new Database();
        }

        public function getProduct(){
            $sql = "SELECT * FROM product";
            return $this->product->getAll($sql);
        }
    }