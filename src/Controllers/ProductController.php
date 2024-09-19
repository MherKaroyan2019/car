<?php
    require_once (__DIR__ . '\MainController.php');

    class ProductController extends Controller{
        public $ProductModel;

        function __construct() {
            $this->ProductModel = new ProductModel();
        }

        public function get($data, $limit = -1){
            return $this->model("ProductModel", "get", $data, $limit);
        }

        public function add($data, $file){
            return $this->model("ProductModel", "add", $data, $file);
        }

        public function delete($data, $imgNames){
            return $this->model("ProductModel", "delete", $data, $imgNames);
        }

        public function update($data, $id, $file){
            return $this->model("ProductModel", "update", $data, $id, $file);
        }
    }
?>