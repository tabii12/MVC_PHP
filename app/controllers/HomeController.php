<?php
    class HomeController{
        private $product;
        private $list;
        private $data = [];
        public function __construct(){
            $this->product = new ProductModel();
            $this->list = new ListModel();
        }

        public function homePage(){
            $this->data['list'] = $this->list->getList();
            $this->data['product'] = $this->product->getProduct();
            
            $this->viewHomePage($this->data);
        }

        public function viewHomePage($data){
            require_once 'app/views/home.php';
        }

        public function headerPage(){
            $this->data['list'] = $this->list->getList();
            $this->data['product'] = $this->product->getProduct();
            
            $this->viewHeader($this->data);
        }
        
        public function viewHeader($data){
            require_once 'app/views/header.php';
        }

        public function viewFooter($data){
            require_once 'app/views/footer.php';
        }
    }