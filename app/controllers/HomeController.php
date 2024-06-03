<?php
    class HomeController{
        private $product;
        private $category;
        private $user;
        private $data = [];
        public function __construct(){
            $this->product = new ProductModel();
            $this->category = new CategoryModel();
            $this->user = new UserModel();
        }

        public function viewHomePage($data){
            require_once '../app/views/home.php';
        }

        public function homePage(){
            $this->data['category'] = $this->category->getCategory();
            $this->data['product'] = $this->product->getProduct();
            
            $this->viewHomePage($this->data);
        }

        public function renderView($data){
            require_once '../app/views/detail.php';
        }

        public function detail(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }else{
                $id = 0;
            }
            $spct = $this->product->getProductOne($id);
            if (is_array($spct)) {
                $this->data['spct'] = $spct;
                $this->renderView($this->data);
            }
        }

        public  function renderCategory($data){
            require_once '../app/views/category.php';
        } 

        public  function category(){
            $this->data['category'] = $this->category->getCategory();
            $this->data['product'] = $this->product->getProduct();
            $this->renderCategory($this->data);
        }

        public function renderLogin($data){
            require_once './views/login.php';
        }

        public function login(){
            $this->data['user'] = $this->user->getUser();
            $this->renderLogin($this->data);
        }

    }