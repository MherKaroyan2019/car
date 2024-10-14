<?php
    require_once (__DIR__ . '\ProductController.php');
    require_once (__DIR__ . '\UserController.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');

    class IndexController extends Controller{
        public $ProductController;
        public $UserController;

        function __construct() {
            $this->ProductController = new ProductController();
            $this->UserController = new UserController();
        }

        public function index(){
            global $result;
            $result = $this->ProductController->get($_POST);
            $this->render('index');
        }

        public function product(){
            global $r, $r1, $result2;
            $result = $this->ProductController->get(["id" => $_GET["id"]]);
            $r = mysqli_fetch_assoc($result);
            $result1 = $this->UserController->get(["id" => $r["userid"]]);
            $r1 = mysqli_fetch_assoc($result1);       
            $result2 = $this->ProductController->get(["brand" => $r["brand"], "model" => $r["model"], "bodytype" => $r["bodytype"], "engine" => $r["engine"], "gearbox" => $r["gearbox"], "towtruck" => $r["towtruck"], "condition" => $r["condition"], "wheel" => $r["wheel"], "customclear" => $r["customclear"], "luke" => $r["luke"]], 6);
            $this->render('product');
        }

        public function login(){
            global $err;
            $err = "";
            if(isset($_POST['login'])){
                $err = $this->UserController->login($_POST);
            }
            $this->render('login');
        }

        public function register(){
            global $err;
            $err = "";
            if(isset($_POST['register'])){
                $err = $this->UserController->register($_POST);
            }
            $this->render('register');
        }

        public function yourpage(){
            if(isset($_GET["action"]) && $_GET["action"] == "delete"){
                $result = $this->ProductController->get(["id" => $_GET["id"]]);
                $r = mysqli_fetch_assoc($result);
                $imgNames = $r["imgNames"];
                $this->ProductController->delete($_GET["id"], $imgNames);
            }
            global $result;
            $result = $this->ProductController->get(["userid" => $_SESSION["id"]]);
            $this->render('yourpage');
        }

        public function add(){
            if(isset($_POST['add'])){
                global $err;
                $err = "";
                if(count(array_filter($_POST)) == count($_POST) || isset($_FILES["tmp_name"])) {
                    if($_FILES["img"]["type"][0] != "image/jpeg" && $_FILES["img"]["type"][0] != "image/jpg"){
                        $err = "Insert jpeg or jpg image";
                    }else{
                        $_POST += ["userid" => $_SESSION["id"]];
                        
                        if(isset($_GET["action"])){
                            $this->ProductController->update($_POST, $_GET["id"], $_FILES);
                        }else if(!isset($_GET["action"])){
                            $this->ProductController->add($_POST, $_FILES);
                        }
                        header("Location: ../public/yourpage.php");
                    }
                } else {
                    $err = "Insert all values";
                }
            }
        
            if(isset($_GET["action"]) && $_GET["action"] == "update"){
                $result = $this->ProductController->get(["id"=>$_GET["id"]]);
                $r = mysqli_fetch_assoc($result);
                $_POST = $r;
            }
            $this->render('add');
        }

        public function settings(){
            if(isset($_POST["update"])){
                $this->UserController->update($_POST, $_SESSION["id"]);
            }

            if(isset($_POST["logout"])){
                $this->UserController->logout();
            }
            
            global $r;
            $result = $this->UserController->get(["id" => $_SESSION["id"]]);
            $r = mysqli_fetch_assoc($result);
            $this->render('settings');
        }
    }
?>