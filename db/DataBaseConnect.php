<?php
final class DatabaseConnection {
    
    private static $instance = null;
    private static $con = null;
    
    private static function getInstance() {
        if (is_null(self::$instance)){
            self::$instance = new DatabaseConnection();
        }
        
        return self::$instance;
    }
    
    private function __construct() {}
    
    private function __clone() {}
    
    
    public static function connect(){
        if (is_null(self::$con)){
            $config = $this->getConfig();
            self::$con = mysqli_connect($config["DB_HOST"],$config["DB_USERNAME"],$config["DB_PASSWORD"],$config["DB_DATABASE"]);
            if (!self::$con) {
                die("connection failed".mysqli_connect_error($db));
            }
        }
        return self::$con;
    }

    public function getConfig(){
        return json_decode(file_get_contents(__DIR__ . "\..\config.json"), true);
    }
}