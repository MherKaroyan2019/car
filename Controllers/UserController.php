<?php
    require_once (__DIR__ . '\MainController.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');

    class UserController extends Controller{
        public $ProductModel;
        public $UserModel;

        function __construct() {
            $this->ProductModel = new ProductModel();
            $this->UserModel = new UserModel();
        }

        public function login(){
            $err = "";
            if(isset($_POST['login'])){
                $err = $this->UserModel->login($_POST);
            }
            $this->render('login', ["err" => $err]);
        }

        public function register(){
            $err = "";
            if(isset($_POST['register'])){
                $err = $this->UserModel->register($_POST);
            }
            $this->render('register', ["err" => $err]);
        }

        public function yourpage(){
            if(isset($_GET["action"]) && $_GET["action"] == "delete"){
                $result = $this->ProductModel->get(["id" => $_GET["id"]]);
                $r = mysqli_fetch_assoc($result);
                $imgNames = $r["imgNames"];
                $this->ProductModel->delete($_GET["id"], $imgNames);
            }
            $result = $this->ProductModel->get(["userid" => $_SESSION["id"]]);
            $this->render('yourpage', ["result" => $result]);
        }

        public function settings(){
            if(isset($_POST["update"])){
                $this->UserModel->update($_POST, $_SESSION["id"]);
            }

            if(isset($_POST["logout"])){
                $this->UserModel->logout();
            }
            
            $result = $this->UserModel->get(["id" => $_SESSION["id"]]);
            $r = mysqli_fetch_assoc($result);
            $this->render('settings', ["r" => $r]);
        }
    }
?>