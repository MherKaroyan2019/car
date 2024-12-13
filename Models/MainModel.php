<?php
    require_once (__DIR__ . '\..\db\DataBaseConnect.php');
    
    class Model{
        private static $instance = null;
        private static $con = null;
        
        private static function getInstance() {
            if (is_null(self::$instance)){
                self::$instance = new DatabaseConnection();
            }
            
            return self::$instance;
        }
        
        
        public static function connect(){
            if (is_null(self::$con)){
                $config = self::getConfig();
                self::$con = mysqli_connect($config["DB_HOST"],$config["DB_USERNAME"],$config["DB_PASSWORD"],$config["DB_DATABASE"]);
                if (!self::$con) {
                    die("connection failed".mysqli_connect_error($db));
                }
            }
            return self::$con;
        }
    
        public static function getConfig(){
            return json_decode(file_get_contents(__DIR__ . "\..\config.json"), true);
        }

        protected function sql($sql){
            $db = $this->connect();
            $result = mysqli_query($db, $sql);
            return $result;
        }
    }
?>