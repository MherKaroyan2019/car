<?php
    require_once (__DIR__ . '\MainController.php');
    require_once (__DIR__ . '\ProductController.php');
    require_once (__DIR__ . '\UserController.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');

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

        public function settings(){
            $this->render('settings');
        }
    }
?>