<?php
    require_once (__DIR__ . '\MainModel.php');
    include "db.php";

    class UserModel extends Model{
        public function add($data){
            global $db;
            extract($data);
            $sql = "INSERT INTO Customers Where `email` = '$email' And `password` = '$password'";
            $this->sql($sql, $db);
        }

        public function get($data){
            global $db;

            $sql = "SELECT * From `user`";
            $returnValues = [];
            
            foreach($data as $key => $value){
                if($value == "Դիտել" || $value == "Մուտք"){
                    break;
                }
                array_push($returnValues, "`$key` = '$value'");
            }

            if($returnValues){
                $sql .= "Where" . join(" AND ", $returnValues);
            }

            $result = mysqli_query($db, $sql);

            return $result;
        }

        public function update($data, $id){
            global $db;
            $err = "";
            if((isset($data["name"]) && $data["name"] != "") || (isset($data["email"]) && $data["email"] != "")){
                if(isset($_POST["name"])){
                    $_SESSION["name"] = $data["name"];
                }
            }else{
                $err = "No empty inputes";
                return $err;
            }

            $returnValues = [];

            foreach($data as $key => $value){
                if($value == "Պահպանել"){
                    continue;
                }else{
                    array_push($returnValues, "`$key` = '$value'");
                }        
            }
            $sql = "UPDATE user SET " . join(", ", $returnValues) . " Where id = '$id';";
            mysqli_query($db, $sql);
        }

        public function login($data){
            $err = "";
            if($_POST['email'] != "" && $_POST['password'] != ""){
                $result = $this->get($data);
                if(mysqli_num_rows($result) == 0){
                    $err = 'Անվավեր մուտքանուն կամ գաղտնաբառ:';
                } else {
                    $r = mysqli_fetch_assoc($result);
                    $_SESSION["id"] = $r["id"];
                    $_SESSION["name"] = $r["name"];
                    header("Location: ../public");
                }
            }else{
                $err = 'Լրացրեք բոլոր դաշտերը';
            }
            return $err;
        }

        public function register($data){
            $err = "";
            if($data['name'] != "" && $data['email'] != "" && $data['password'] != ""){   
                $result = $this->get(["email" => $data['email']]);
                if(mysqli_num_rows($result) == 0){
                    $data += ["date" => date('d/m/Y')];
                    $this->add($data);
                    header("Location: login.php");
                }else{
                    $err = "Այս էլեկտրոնային հասցեով կա արդեն գրանցված հաշիվ";
                }
            }else{
                $err = 'Լրացրեք բոլոր դաշտերը';
            }
            return $err;
        }
    }
?>