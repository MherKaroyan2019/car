<?php
    require_once (__DIR__ . '\MainController.php');

    class UserController extends Controller{
        public $UserModel;

        function __construct() {
            $this->UserModel = new UserModel();
        }

        public function get($data){
            return $this->model("UserModel", "get", $data);
        }

        public function add($data){
            return $this->model("UserModel", "add", $data);
        }

        public function delete($data){
            return $this->model("UserModel", "delete", $data);
        }

        public function update($data, $id){
            return $this->model("UserModel", "update", $data, $id);
        }

        public function login($data){
            return $this->model("UserModel", "login", $data);
        }

        public function register($data){
            return $this->model("UserModel", "register", $data);
        }

        public function logout(){
            return $this->model("UserModel", "logout");
        }
    }
?>