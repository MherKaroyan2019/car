<?php
    require_once (__DIR__ . '\..\..\config.php');
    global $DB_HOST;
    global $DB_USERNAME;
    global $DB_PASSWORD;
    global $DB_DATABASE;
    
    $db = mysqli_connect($DB_HOST,$DB_USERNAME,$DB_PASSWORD,$DB_DATABASE);
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }
?>