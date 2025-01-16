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
            $this->render('user\login', ["err" => $err]);
        }

        public function register(){
            $err = "";
            if(isset($_POST['register'])){
                $err = $this->UserModel->register($_POST);
            }
            $this->render('user\register', ["err" => $err]);
        }

        public function index($action = "", $id = ""){
            if(isset($action) && $action == "delete"){
                $result = $this->ProductModel->get(["id" => $id]);

                $r = mysqli_fetch_assoc($result);
                if($result->current_field != 0){
                    $imgNames = $r["imgNames"];
                    $this->ProductModel->delete($id, $imgNames);
                }
            }
            $result = $this->ProductModel->get(["userid" => $_SESSION["id"]]);
            $this->render('user\index', ["result" => $result]);
        }

        public function update(){
            if(isset($_POST["update"])){
                $this->UserModel->update($_POST, $_SESSION["id"]);
            }

            if(isset($_POST["logout"])){
                $this->UserModel->logout();
            }
            
            $result = $this->UserModel->get(["id" => $_SESSION["id"]]);
            $r = mysqli_fetch_assoc($result);
            $this->render('user\update', ["r" => $r]);
        }
    }
?>