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
            $sql = "INSERT INTO product (name,price,id_list,image) VALUES (?,?,?,?)";
            $param = [$data['name'],$data['price'],$data['id_list'],$data['image']];
            return $this->product->insert($sql, $param);
        }

        public function deleteProduct($id){
            $sql = " DELETE FROM product WHERE id = ?";

            return $this->product->delete($sql,[$id]);
        }

        public function updatePro($data) {
            $sql = "UPDATE product SET name = ?, price = ?, id_list = ?, image = ? WHERE id = ?";
            $param = [$data['name'], $data['price'], $data['id_list'], $data['image'], $data['id']];
            $this->product->update($sql, $param);
        }

    }