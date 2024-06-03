<?php
    class ProductModel{
        private $product;

        public function __construct(){
            $this->product = new Database();
        }

        public function getProductOne($id){
            $sql = "SELECT * FROM product WHERE id = $id";
            return $this->product->getOne($sql);
        }

        public function getProduct(){
            $sql = "SELECT * FROM product";
            return $this->product->getAll($sql);
        }

        public function insertProduct($data){
            $sql = "INSERT INTO product (id, id_list, image, name, price) VALUES (NULL, :id_list, :image, :name, :price)";
            $param = [$data['name'],$data['price'],$data['id_list'],$data['image']];
            return $this->product->insert($sql, $param);
        }

        public function deleteProduct($id){
            $sql = " DELETE FROM product WHERE id = ?";

            return $this->product->delete($sql);
        }

    }