<?php
    require_once (__DIR__ . '\..\controller.php');

    class ProductController extends Controller{
        public $ProductModel;

        function __construct() {
            $this->ProductModel = new ProductModel();
        }

        public function get($data, $limit = -1){
            return $this->model("ProductModel", "get", $data, $limit);
        }

        public function add($data){
            return $this->model("ProductModel", "add", $data);
        }
    }
?>