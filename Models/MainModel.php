<?php
    require_once (__DIR__ . '\..\db\DataBaseConnect.php');
    $config = json_decode(file_get_contents(__DIR__ . "\..\config.json"), true);
    
    DatabaseConnection::connect($config["DB_HOST"],$config["DB_USERNAME"],$config["DB_PASSWORD"],$config["DB_DATABASE"]);
    $dbh = DatabaseConnection::getInstance();
    $db = $dbh->getConnection();
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }
    
    class Model{
        protected function sql($sql, $db){
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
?>