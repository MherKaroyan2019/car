<?php
final class DatabaseConnection {
    
    private static $instance = null;
    private static $connection;
    
    public static function getInstance() {
        if (is_null(self::$instance)){
            self::$instance = new DatabaseConnection();
        }
        
        return self::$instance;
    }
    
    private function __construct() {}
    
    private function __clone() {}
    
    
    public static function connect($host, $user, $password, $dbName){
        self::$connection = mysqli_connect($host,$user,$password,$dbName);
    }
    
    public static function getConnection() {
        return self::$connection;
    }
    

}