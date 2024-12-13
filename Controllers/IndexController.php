<?php
    require_once (__DIR__ . '\MainController.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');

    class IndexController extends Controller{
        public $ProductModel;

        function __construct() {
            $this->ProductModel = new ProductModel();
        }

        public function index(){
            $result = $this->ProductModel->get($_POST);
            $this->render('index\index', ["result" => $result]);
        }
    }
?>