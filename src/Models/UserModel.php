<?php
    require_once (__DIR__ . '\..\Model.php');

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
    }
?>