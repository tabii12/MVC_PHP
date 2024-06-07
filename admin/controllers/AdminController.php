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

        public function addProduct() {
            require_once './views/addpro.php';
            if (isset($_POST['submit'])) {
                $data = [];
                $data['name'] = $_POST['name'];
                $data['price'] = $_POST['price'];
                $data['id_list'] = $_POST['id_list'];
        
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $data['image'] = $_FILES['image']['name'];
                    $targetDir = '../public/img/product_';
                    $targetFile = $targetDir . basename($data['image']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                        // Upload successfully
                    } else {
                        echo 'Something when wrong!!';
                        return;
                    }
                } else {
                    $data['image'] = '';
                }
        
                $this->product->insertProduct($data);
                echo '<script>location.href="index.php?page=product"</script>';
            }
        }

        public function del(){
            if(isset($_GET['id'])&&$_GET['id']>0){  
                $id = $_GET['id'];
                $data = $this->product->getProductOne($id);

                if ($data && isset($data['image']) && !empty($data['image'])) {
                    $file = '../public/img/product_' . $data['image'];
        
                    if (is_file($file) && file_exists($file)) {
                        unlink($file);
                    }
                }

                $this->product->deleteProduct($id);
                echo '<script>location.href="index.php?page=home"</script>';
            }
        }

        public function renderEdit($data){
            require_once './views/editpro.php';
        }
        public function edit(){
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = $_GET['id'];
                $this->data['category'] = $this->category->getCategory();
                $this->data['product'] = $this->product->getProductOne($id);
                $this->renderEdit($this->data);
            }
        }

        public function editPro() {
            if (isset($_POST['submit'])) {
                $data = [];
                $data['id'] = $_POST['idpro'];
                $data['name'] = $_POST['name'];
                $data['price'] = $_POST['price'];
                $data['id_list'] = $_POST['id_list'];
                $data['image_old'] = $_POST['image_old'];
                
        
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    // Handle file upload
                    $file = '../public/img/product_' . basename($_FILES['image']['name']);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
                        // Delete the old image if a new one has been uploaded successfully
                        $file_old = '../public/img/product_' . $data['image_old'];
                        if (file_exists($file_old)) {
                            unlink($file_old);
                        }
                        $data['image'] = basename($_FILES['image']['name']);
                    } else {
                        echo '<script>alert("Error uploading new image.");</script>';
                        return;
                    }
                } else {
                    // No new image uploaded, keep the old one
                    $data['image'] = $data['image_old'];
                }
        
                $this->product->updatePro($data);
                echo '<script>alert("Update successful");</script>';
                echo '<script>location.href="index.php?page=product"</script>';
            }
        }
        

    }