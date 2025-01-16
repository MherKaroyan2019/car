<?php
    require_once (__DIR__ . '\MainController.php');
    require_once (__DIR__ . '\..\Models\ProductModel.php');
    require_once (__DIR__ . '\..\Models\UserModel.php');

    class ProductController extends Controller{
        public $ProductModel;
        public $UserModel;

        function __construct() {
            $this->ProductModel = new ProductModel();
            $this->UserModel = new UserModel();
        }

        public function show($id){
            $result = $this->ProductModel->get(["id" => $id]);
            $r = mysqli_fetch_assoc($result);
            $result1 = $this->UserModel->get(["id" => $r["userid"]]);
            $r1 = mysqli_fetch_assoc($result1);       
            $result2 = $this->ProductModel->get(["brand" => $r["brand"], "model" => $r["model"], "bodytype" => $r["bodytype"], "engine" => $r["engine"], "gearbox" => $r["gearbox"], "towtruck" => $r["towtruck"], "condition" => $r["condition"], "wheel" => $r["wheel"], "customclear" => $r["customclear"], "luke" => $r["luke"]], 6);
            $this->render('product\show', ["r" => $r, "r1" => $r1, "result2" => $result2]);
        }
        
        public function add(){
            $err = "";
            if(isset($_POST['add'])){
                $err = "";
                if(count(array_filter($_POST)) == count($_POST) || isset($_FILES["tmp_name"])) {
                    if($_FILES["img"]["type"][0] != "image/jpeg" && $_FILES["img"]["type"][0] != "image/jpg"){
                        $err = "Insert jpeg or jpg image";
                    }else{
                        $_POST += ["userid" => $_SESSION["id"]];
                        
                        if(isset($_GET["action"])){
                            $this->ProductModel->update($_POST, $_GET["id"], $_FILES);
                        }else if(!isset($_GET["action"])){
                            $this->ProductModel->add($_POST, $_FILES);
                        }
                        header("Location: ../user/");
                    }
                } else {
                    $err = "Insert all values";
                }
            }
        
            if(isset($_GET["action"]) && $_GET["action"] == "update"){
                $result = $this->ProductModel->get(["id"=>$_GET["id"]]);
                $r = mysqli_fetch_assoc($result);
                $_POST = $r;
            }
            $this->render('product\add', ["err" => $err]);
        }
    }
?>