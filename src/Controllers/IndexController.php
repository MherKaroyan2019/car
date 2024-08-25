<?php
    require_once (__DIR__ . '\..\controller.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');
    require_once (__DIR__ . '\..\Views\db.php');

    class IndexController extends Controller{
        public function index(){
            $this->render('index');
        }

        public function product(){
            $this->render('product');
        }

        public function login(){
            $this->render('login');
        }

        public function register(){
            $this->render('register');
        }

        public function yourpage(){
            $this->render('yourpage');
        }

        public function add(){
            $this->render('add');
        }
    }
?>