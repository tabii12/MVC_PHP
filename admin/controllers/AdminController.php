<?php
    class AdminController{
        private $product;
        private $category;
        private $user;
        private $data = [];
        public function __construct(){
            $this->product = new ProductModel();
            $this->category = new CategoryModel();
            $this->user = new UserModel();
        }

        public  function renderCategory($data){
            require_once './views/webadmin.php';
        } 

        public  function category(){
            $this->data['category'] = $this->category->getCategory();
            $this->renderCategory($this->data);
        }

        public function rednerProduct($data){
            require_once './views/product.php';
        }

        public  function product(){
            $this->data['product'] = $this->product->getProduct();
            $this->rednerProduct($this->data);
        }

        public function rednerUser($data){
            require_once './views/user.php';
        }

        public  function user(){
            $this->data['user'] = $this->user->getUser();
            $this->rednerUser($this->data);
        }

        public function addProduct(){
            require_once './views/addpro.php';
            if(isset($_POST['button'])){
                $data = [];
                $data['name'] = $_POST['name'];
                $data['price'] = $_POST['price'];
                $data['id_list'] = $_POST['id_list'];
                $data['image'] = $_FILES['image']['name'];
                $file = '../public/img'.$data['img'];
                move_uploaded_file($_FILES['image']['tmp_name'],$file);
                $this->product->insertProduct($data);
                echo 'hello';
                // echo '<script>location.href="index.php?page=product"</script>';
            }
            
        }

        function deleteProduct(){
            if(isset($_GET['id'])&&$_GET['id']>0){
                $id = $_GET['id'];
                $data = $this->product->getProduct();
                $file = '../public/img'.$data['image'];
                unlink($file);
                $this->product->deleteProduct($id);
            }
        }

    }