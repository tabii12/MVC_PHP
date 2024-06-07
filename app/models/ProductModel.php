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

        public function getProductOne($id){
            $sql = "SELECT * FROM product WHERE id = $id";
            return $this->product->getOne($sql);
        }

    }