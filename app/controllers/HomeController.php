<?php
    class HomeController{
        private $product;
        private $data = [];
        public function __construct(){
            $this->product = new ProductModel();
        }

        public function homePage(){
            $this->data['product'] = $this->product->getProduct();
            $this->vewHomePage($this->data);
        }

        public function vewHomePage($data){
            require_once 'app/views/home.php';
        }
        
        public function newArrivals($product){
            usort($product, function($a, $b){
                return $a['id'] <=> $b['id'];
            });
            return array_splice($product, 0, 4);
        }

        public function topSelling($product){
            usort($product, function($a,$b){
                return $b['purchases'] <=> $a['purchases'];
            });
            return array_splice($product, 0, 4);
        }
    }