<?php
    require_once (__DIR__ . '\MainController.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');

    class IndexController extends Controller{
        public function index($ProductController, $UserController){
            $result = $ProductController->get($_POST);
            $this->render('index', ["result" => $result]);
        }

        public function product($ProductController, $UserController){
            $result = $ProductController->get(["id" => $_GET["id"]]);
            $r = mysqli_fetch_assoc($result);
            $result1 = $UserController->get(["id" => $r["userid"]]);
            $r1 = mysqli_fetch_assoc($result1);       
            $result2 = $ProductController->get(["brand" => $r["brand"], "model" => $r["model"], "bodytype" => $r["bodytype"], "engine" => $r["engine"], "gearbox" => $r["gearbox"], "towtruck" => $r["towtruck"], "condition" => $r["condition"], "wheel" => $r["wheel"], "customclear" => $r["customclear"], "luke" => $r["luke"]], 6);
            $this->render('product', ["r" => $r, "r1" => $r1, "result2" => $result2]);
        }

        public function login($ProductController, $UserController){
            $err = "";
            if(isset($_POST['login'])){
                $err = $UserController->login($_POST);
            }
            $this->render('login', ["err" => $err]);
        }

        public function register($ProductController, $UserController){
            $err = "";
            if(isset($_POST['register'])){
                $err = $UserController->register($_POST);
            }
            $this->render('register', ["err" => $err]);
        }

        public function yourpage($ProductController, $UserController){
            if(isset($_GET["action"]) && $_GET["action"] == "delete"){
                $result = $ProductController->get(["id" => $_GET["id"]]);
                $r = mysqli_fetch_assoc($result);
                $imgNames = $r["imgNames"];
                $ProductController->delete($_GET["id"], $imgNames);
            }
            $result = $ProductController->get(["userid" => $_SESSION["id"]]);
            $this->render('yourpage', ["result" => $result]);
        }

        public function add($ProductController, $UserController){
            $err = "";
            if(isset($_POST['add'])){
                $err = "";
                if(count(array_filter($_POST)) == count($_POST) || isset($_FILES["tmp_name"])) {
                    if($_FILES["img"]["type"][0] != "image/jpeg" && $_FILES["img"]["type"][0] != "image/jpg"){
                        $err = "Insert jpeg or jpg image";
                    }else{
                        $_POST += ["userid" => $_SESSION["id"]];
                        
                        if(isset($_GET["action"])){
                            $ProductController->update($_POST, $_GET["id"], $_FILES);
                        }else if(!isset($_GET["action"])){
                            $ProductController->add($_POST, $_FILES);
                        }
                        header("Location: ../public/yourpage.php");
                    }
                } else {
                    $err = "Insert all values";
                }
            }
        
            if(isset($_GET["action"]) && $_GET["action"] == "update"){
                $result = $ProductController->get(["id"=>$_GET["id"]]);
                $r = mysqli_fetch_assoc($result);
                $_POST = $r;
            }
            $this->render('add', ["err" => $err]);
        }

        public function settings($ProductController, $UserController){
            if(isset($_POST["update"])){
                $UserController->update($_POST, $_SESSION["id"]);
            }

            if(isset($_POST["logout"])){
                $UserController->logout();
            }
            
            $result = $UserController->get(["id" => $_SESSION["id"]]);
            $r = mysqli_fetch_assoc($result);
            $this->render('settings', ["r" => $r]);
        }
    }
?>