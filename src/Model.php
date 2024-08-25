<?php
    class Model{
        private function sql($sql, $db){
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
?>