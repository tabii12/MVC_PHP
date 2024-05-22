<?php
    class HomeController{
        private $product;
        private $data = [];
        public function __construct(){
            $this->product = new ProductModel();
        }

        public function homePage(){
            $this->data['product'] = $this->product->getProduct();
            
            require_once 'app/views/home.php';
        }
    }